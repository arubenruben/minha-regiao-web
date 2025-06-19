import os
import json
import requests
import pandas as pd
from tqdm import tqdm
import geopandas as gpd
from typing import List, Dict, Optional, Any
from geoalchemy2.shape import to_shape
from shapely.wkb import loads


class DataLoader:
    def __init__(self, base_dir: str = None):
        self.base_dir = base_dir or os.path.dirname(os.path.abspath(__file__))
        self.base_url = "http://localhost:8000/api"
        self.headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
        }

        # Load all CSV files
        self.df = self._load_csv("freguesias_pt_entry.csv")
        self.elections_df = self._load_csv("elections.csv")
        self.election_results_df = self._load_csv("election_results.csv")
        self.presidents_df = self._load_csv("president.csv")
        self.wikipedia_df = self._load_json("wikipedia_entries.json")

    def _load_csv(self, filename: str) -> pd.DataFrame:
        return pd.read_csv(os.path.join(self.base_dir, filename), sep=";")

    def _load_json(self, filename: str) -> pd.DataFrame:
        return pd.read_json(os.path.join(self.base_dir, filename))

    def _make_request(self, endpoint: str, data: Dict[str, Any]) -> Dict[str, Any]:
        """Make a POST request to the API"""
        response = requests.post(
            f"{self.base_url}/{endpoint}/", json=data, headers=self.headers
        )
        response.raise_for_status()
        return response.json()

    def _save_mapping(self, filename: str, data: List[Dict]) -> None:
        """Save mapping data to JSON file"""
        with open(os.path.join(self.base_dir, filename), "w") as f:
            json.dump(data, f, indent=4, ensure_ascii=False)

    def _load_mapping(self, filename: str) -> Optional[List[Dict]]:
        """Load mapping data from JSON file if it exists"""
        filepath = os.path.join(self.base_dir, filename)
        if os.path.exists(filepath):
            with open(filepath, "r") as f:
                return json.load(f)
        return None

    def _create_party(self, party: str) -> Dict[str, Any]:
        """Create a single party via API"""
        response_data = self._make_request("parties", {"acronym": party})
        return {
            "old_party_name": party,
            "new_party_id": response_data["id"],
        }

    def _get_unique_parties(self) -> List[str]:
        """Get unique parties from election results"""
        self.election_results_df["party"] = self.election_results_df[
            "party"
        ].str.strip()
        return self.election_results_df["party"].unique()

    def _create_wikipedia_entry(self, row: Any, new_freguesia_pt_entry: int) -> None:
        """Create Wikipedia entry if it exists"""
        if pd.notna(row.wikipedia_entry_id):
            wikipedia_entry = self.wikipedia_df[
                self.wikipedia_df["id"] == row.wikipedia_entry_id
            ]
            if not wikipedia_entry.empty:
                entry = wikipedia_entry.iloc[0]
                self._make_request(
                    "wikipedia",
                    {
                        "title": entry["title"],
                        "url": entry["wikipedia_url"],
                        "summary": entry["summary"],
                        "freguesia_pt_entry_id": new_freguesia_pt_entry,
                    },
                )

    def _build_location_data(self, row: Any) -> Dict[str, Any]:
        """Build common location data dictionary"""
        # row.geo_polygon and row.polygon_centroid are string representations of hexadecimal binary
        # Load the hexadecimal binary into a geometry object
        if not pd.isna(row.geo_polygon):
            geo_polygon = loads(row.geo_polygon)
            gdf = gpd.GeoDataFrame(geometry=[geo_polygon], crs="epsg:3763", index=[0])
            gdf = gdf.to_crs(epsg=4326)
            geo_polygon_geo_json = gdf.geometry[0].__geo_interface__
        else:
            geo_polygon_geo_json = None

        if pd.isna(row.polygon_centroid):
            centroid_geo_json = None
        else:
            polygon_centroid = loads(row.polygon_centroid)
            centroid_gdf = gpd.GeoDataFrame(
                geometry=[polygon_centroid], crs="epsg:3763", index=[0]
            )
            centroid_gdf = centroid_gdf.to_crs(epsg=4326)
            centroid_geo_json = centroid_gdf.geometry[0].__geo_interface__

        if hasattr(row, "old_geo_polygon") and pd.notna(row.old_geo_polygon):
            old_geo_polygon = loads(row.old_geo_polygon)
            old_gdf = gpd.GeoDataFrame(
                geometry=[old_geo_polygon], crs="epsg:3763", index=[0]
            )
            old_gdf = old_gdf.to_crs(epsg=4326)
            old_geo_polygon_geo_json = old_gdf.geometry[0].__geo_interface__
        else:
            old_geo_polygon_geo_json = None

        if hasattr(row, "old_polygon_centroid") and row.old_polygon_centroid:
            old_polygon_centroid = loads(row.old_polygon_centroid)
            old_centroid_gdf = gpd.GeoDataFrame(
                geometry=[old_polygon_centroid], crs="epsg:3763", index=[0]
            )
            old_centroid_gdf = old_centroid_gdf.to_crs(epsg=4326)
            old_centroid_geo_json = old_centroid_gdf.geometry[0].__geo_interface__
        else:
            old_centroid_geo_json = None

        return {
            "name": row.name,
            "freguesias_pt_url": row.freguesias_pt_url,
            "freguesias_pt_id": row.freguesias_pt_id,
            "address": row.address if pd.notna(row.address) else None,
            "email": row.email if pd.notna(row.email) else None,
            "phone": row.phone if pd.notna(row.phone) else None,
            "website": row.website if pd.notna(row.website) else None,
            "geo_polygon": geo_polygon_geo_json,
            "polygon_centroid": centroid_geo_json,
            "old_geo_polygon": old_geo_polygon_geo_json,
            "old_polygon_centroid": old_centroid_geo_json,
        }

    def _find_mapping_id(
        self, mapping: List[Dict], old_key: str, old_value: Any, new_key: str
    ) -> int:
        """Find new ID from mapping"""
        for item in mapping:
            if item[old_key] == old_value:
                return item[new_key]
        raise ValueError(f"ID {old_value} not found in mapping")

    def _create_election_data(
        self, election_row: Any, freguesia_pt_entry_id: int
    ) -> Dict[str, Any]:
        """Build election data dictionary"""
        return {
            "year": election_row.year,
            "number_participant_voters": election_row.number_participant_voters,
            "number_registered_voters": election_row.number_registered_voters,
            "number_blank_votes": election_row.number_blank_votes,
            "number_null_votes": election_row.number_null_votes,
            "number_absentee_votes": election_row.number_absentee_votes,
            "freguesia_pt_entry_id": freguesia_pt_entry_id,
        }

    def _get_president_for_election(self, election_row: Any) -> Optional[Dict]:
        """Get president data for a specific election"""
        president = self.presidents_df[
            (self.presidents_df["election_id"] == election_row.id)
            & (self.presidents_df["start_year"] == election_row.year)
        ].to_dict(orient="records")

        if len(president) > 1:
            raise ValueError(
                f"Multiple presidents found for election ID {election_row.id}"
            )

        return president[0] if president else None

    def _process_election_results(
        self, election_row: Any, election_id: int, parties: List[Dict]
    ) -> None:
        """Process all election results for a given election"""
        president = self._get_president_for_election(election_row)

        for result_row in self.election_results_df[
            self.election_results_df["election_id"] == election_row.id
        ].itertuples():
            party_id = self._find_mapping_id(
                parties, "old_party_name", result_row.party, "new_party_id"
            )

            result_data = self._make_request(
                "election_results",
                {
                    "election_id": election_id,
                    "party_id": party_id,
                    "number_votes": result_row.votes,
                    "percentage_votes": result_row.percentage,
                },
            )

            if president and result_row.party == president["party"]:
                self._make_request(
                    "candidates",
                    {
                        "name": president["name"],
                        "election_result_id": result_data["id"],
                    },
                )

    def _process_elections_for_entry(
        self, row: Any, freguesia_pt_entry_id: int, parties: List[Dict]
    ) -> None:
        """Process all elections for a freguesia entry"""
        for election_row in self.elections_df[
            self.elections_df["freguesia_pt_entry_id"] == row.id
        ].itertuples():
            election_data = self._create_election_data(
                election_row, freguesia_pt_entry_id
            )
            election_response = self._make_request("elections", election_data)
            election_id = election_response["id"]

            self._process_election_results(election_row, election_id, parties)

    def load_parties(self) -> List[Dict]:
        """Load or create all parties"""
        existing_parties = self._load_mapping("parties.json")
        if existing_parties:
            return existing_parties

        unique_parties = self._get_unique_parties()
        parties = []

        for party in tqdm(unique_parties, desc="Loading parties"):
            parties.append(self._create_party(party))

        self._save_mapping("parties.json", parties)
        return parties

    def load_districts(self) -> List[Dict]:
        """Load all districts"""
        existing_mapping = self._load_mapping("districts_mapping.json")

        if existing_mapping:
            return existing_mapping

        df_districts = self.df[self.df["district_id"].notna()]
        mapping = []

        for row in tqdm(
            df_districts.itertuples(), desc="Loading districts", total=len(df_districts)
        ):
            location_data = self._build_location_data(row)
            response_data = self._make_request("districts", location_data)
            new_district_id = response_data["id"]

            self._create_wikipedia_entry(
                row, new_freguesia_pt_entry=response_data["freguesia_pt_entry_id"]
            )

            mapping.append(
                {
                    "old_district_id": row.district_id,
                    "new_district_id": new_district_id,
                }
            )

        self._save_mapping("districts_mapping.json", mapping)
        return mapping

    def load_cities(
        self, district_mapping: List[Dict], parties: List[Dict]
    ) -> List[Dict]:
        """Load all cities"""
        existing_mapping = self._load_mapping("city_mapping.json")

        if existing_mapping:
            return existing_mapping

        df_cities = self.df[self.df["city_id"].notna()]
        df_city_raw = self._load_csv("city.csv")
        mapping = []

        for row in tqdm(
            df_cities.itertuples(), desc="Loading cities", total=len(df_cities)
        ):
            city_row = df_city_raw[df_city_raw["id"] == row.city_id]
            if city_row.empty:
                raise ValueError(f"City ID {row.city_id} not found")

            district_id = self._find_mapping_id(
                district_mapping,
                "old_district_id",
                city_row.iloc[0]["district_id"],
                "new_district_id",
            )

            location_data = self._build_location_data(row)
            location_data["district_id"] = district_id

            response_data = self._make_request("cities", location_data)
            new_city_id = response_data["id"]

            self._create_wikipedia_entry(row, response_data["freguesia_pt_entry_id"])

            mapping.append(
                {
                    "old_city_id": row.city_id,
                    "new_city_id": new_city_id,
                }
            )

            self._process_elections_for_entry(
                row, response_data["freguesia_pt_entry_id"], parties
            )

        self._save_mapping("city_mapping.json", mapping)

        return mapping

    def load_municipalities(
        self, city_mapping: List[Dict], parties: List[Dict]
    ) -> None:
        """Load all municipalities"""
        df_municipalities = self.df[self.df["municipality_id"].notna()]
        df_raw_municipalities = self._load_csv("municipality.csv")

        if df_municipalities.empty:
            raise ValueError("No municipalities to load")

        for row in tqdm(
            df_municipalities.itertuples(),
            desc="Loading municipalities",
            total=len(df_municipalities),
        ):
            municipality_row = df_raw_municipalities[
                df_raw_municipalities["id"] == row.municipality_id
            ]
            if municipality_row.empty:
                raise ValueError(f"Municipality ID {row.municipality_id} not found")
            try:
                city_id = self._find_mapping_id(
                    city_mapping,
                    "old_city_id",
                    municipality_row.iloc[0]["city_id"],
                    "new_city_id",
                )
            except ValueError as e:
                print(f"Skipping row {row.municipality_id}: {e}")
                continue

            location_data = self._build_location_data(row)
            location_data["city_id"] = city_id

            response_data = self._make_request("parishes", location_data)
            new_municipality_id = response_data["id"]

            self._create_wikipedia_entry(row, response_data["freguesia_pt_entry_id"])

            self._process_elections_for_entry(
                row, response_data["freguesia_pt_entry_id"], parties
            )

    def load_all_data(self) -> None:
        """Load all data in the correct order"""
        parties = self.load_parties()
        district_mapping = self.load_districts()
        city_mapping = self.load_cities(district_mapping, parties)
        self.load_municipalities(city_mapping, parties)


if __name__ == "__main__":
    loader = DataLoader()
    loader.load_all_data()
