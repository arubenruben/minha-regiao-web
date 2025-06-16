import os
import json
import requests
import pandas as pd
from tqdm import tqdm

CURRENT_DIR = os.path.dirname(os.path.abspath(__file__))

df = pd.read_csv(
    os.path.join(CURRENT_DIR, "freguesias_pt_entry.csv"),
    sep=";",
)

elections_df = pd.read_csv(
    os.path.join(CURRENT_DIR, "elections.csv"),
    sep=";",
)

election_results_df = pd.read_csv(
    os.path.join(CURRENT_DIR, "election_results.csv"),
    sep=";",
)

presidents_df = pd.read_csv(
    os.path.join(CURRENT_DIR, "president.csv"),
    sep=";",
)

wikipedia_df = pd.read_json(
    os.path.join(CURRENT_DIR, "wikipedia_entries.json"),
)


def create_party(party):
    """Helper function to create a single party via API"""
    response = requests.post(
        f"http://localhost:8000/api/parties/",
        json={"acronym": party},
        headers={"Content-Type": "application/json", "Accept": "application/json"},
    )
    response.raise_for_status()
    return {
        "old_party_name": party,
        "new_party_id": response.json()["id"],
    }


def load_parties():

    if os.path.exists(os.path.join(CURRENT_DIR, "parties.json")):
        with open(
            os.path.join(CURRENT_DIR, "parties.json"),
            "r",
        ) as f:
            return json.load(f)

    # Strip whitespace from party names in election_results_df
    election_results_df["party"] = election_results_df["party"].str.strip()

    # Get unique list of parties from election_results_df
    unique_parties = election_results_df["party"].unique()

    # Create parties sequentially
    parties = []

    for party in tqdm(unique_parties, desc="Loading parties"):
        parties.append(create_party(party))

    with open(
        os.path.join(CURRENT_DIR, "parties.json"),
        "w",
    ) as f:
        json.dump(parties, f, indent=4, ensure_ascii=False)

    return parties


def load_districts(df):
    # Filter out rows with NaN in 'district_id'
    df_districts = df[df["district_id"].notna()]

    mapping = []

    for row in tqdm(
        df_districts.itertuples(), desc="Loading districts", total=len(df_districts)
    ):
        response = requests.post(
            f"http://localhost:8000/api/districts/",
            json={
                "name": row.name,
                "freguesias_pt_url": row.freguesias_pt_url,
                "freguesias_pt_id": row.freguesias_pt_id,
                "address": row.address if pd.notna(row.address) else None,
                "email": row.email if pd.notna(row.email) else None,
                "phone": row.phone if pd.notna(row.phone) else None,
                "website": row.website if pd.notna(row.website) else None,
            },
        )
        response.raise_for_status()

        new_district_id = response.json()["data"]["id"]

        # Find entry in wikipedia_df whose id matches the row.wikipedia_entry_id
        if pd.notna(row.wikipedia_entry_id):
            wikipedia_entry = wikipedia_df[wikipedia_df["id"] == row.wikipedia_entry_id]

            if not wikipedia_entry.empty:
                response = requests.post(
                    f"http://localhost:8000/api/wikipedia/",
                    json={
                        "title": wikipedia_entry.iloc[0]["title"],
                        "url": wikipedia_entry.iloc[0]["wikipedia_url"],
                        "summary": wikipedia_entry.iloc[0]["summary"],
                        "freguesia_pt_entry_id": response.json()["data"][
                            "freguesia_pt_entry_id"
                        ],
                    },
                    headers={
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                    },
                )
                response.raise_for_status()

        mapping.append(
            {
                "old_district_id": row.district_id,
                "new_district_id": new_district_id,
            }
        )

    return mapping


def load_cities(df, district_mapping, parties):

    if os.path.exists(os.path.join(CURRENT_DIR, "city_mapping.json")):
        with open(
            os.path.join(CURRENT_DIR, "city_mapping.json"),
            "r",
        ) as f:
            return json.load(f)

    # Filter out rows with NaN in 'city_id'
    df = df[df["city_id"].notna()]

    df_city_raw = pd.read_csv(
        os.path.join(CURRENT_DIR, "city.csv"),
        sep=";",
    )

    mapping = []

    for row in tqdm(df.itertuples(), desc="Loading cities", total=len(df)):
        # Find the new district ID from the mapping
        city_row = df_city_raw[df_city_raw["id"] == row.city_id]

        if city_row.empty:
            raise ValueError(f"City ID {row.city_id} not found in city mapping.")

        for district in district_mapping:
            if district["old_district_id"] == city_row.iloc[0]["district_id"]:
                district_id = district["new_district_id"]
                break
        else:
            raise ValueError(
                f"District ID {row.district_id} not found in district mapping."
            )

        response = requests.post(
            f"http://localhost:8000/api/cities/",
            json={
                "name": row.name,
                "freguesias_pt_url": row.freguesias_pt_url,
                "freguesias_pt_id": row.freguesias_pt_id,
                "address": row.address if pd.notna(row.address) else None,
                "email": row.email if pd.notna(row.email) else None,
                "phone": row.phone if pd.notna(row.phone) else None,
                "district_id": district_id,
                "website": row.website if pd.notna(row.website) else None,
            },
            headers={"Content-Type": "application/json", "Accept": "application/json"},
        )

        response.raise_for_status()

        mapping.append(
            {
                "old_city_id": row.city_id,
                "new_city_id": response.json()["data"]["id"],
            }
        )

        freguesia_pt_entry_id = response.json()["data"]["id"]

        for election_row in tqdm(
            elections_df[elections_df["freguesia_pt_entry_id"] == row.id].itertuples(),
            desc=f"Loading elections for {row.name}",
        ):
            response = requests.post(
                f"http://localhost:8000/api/elections/",
                json={
                    "year": election_row.year,
                    "number_participant_voters": election_row.number_participant_voters,
                    "number_registered_voters": election_row.number_registered_voters,
                    "number_blank_votes": election_row.number_blank_votes,
                    "number_null_votes": election_row.number_null_votes,
                    "number_absentee_votes": election_row.number_absentee_votes,
                    "freguesia_pt_entry_id": freguesia_pt_entry_id,
                },
            )

            response.raise_for_status()

            election_id = response.json()["id"]

            president = presidents_df[
                (presidents_df["election_id"] == election_row.id)
                & (presidents_df["start_year"] == election_row.year)
            ].to_dict(orient="records")

            if len(president) > 1:
                raise ValueError(
                    f"Multiple presidents found for election ID {election_row.id} in year {election_row.year}."
                )

            if len(president) == 0:
                president = None
            else:
                president = president[0]

            for election_result_row in election_results_df[
                election_results_df["election_id"] == election_row.id
            ].itertuples():

                # Find the party ID from the parties list
                for party in parties:
                    if party["old_party_name"] == election_result_row.party:
                        party_id = party["new_party_id"]
                        break
                else:
                    raise ValueError(
                        f"Party '{election_result_row.party}' not found in parties list."
                    )

                response = requests.post(
                    f"http://localhost:8000/api/election_results/",
                    json={
                        "election_id": election_id,
                        "party_id": party_id,
                        "number_votes": election_result_row.votes,
                        "percentage_votes": election_result_row.percentage,
                    },
                )

                response.raise_for_status()

                election_result_id = response.json()["id"]

                if president is None:
                    continue

                if election_result_row.party == president["party"]:
                    response = requests.post(
                        f"http://localhost:8000/api/candidates/",
                        json={
                            "name": president["name"],
                            "election_result_id": election_result_id,
                        },
                    )
                    response.raise_for_status()

    with open(
        os.path.join(CURRENT_DIR, "city_mapping.json"),
        "w",
    ) as f:
        json.dump(mapping, f, indent=4, ensure_ascii=False)

    return mapping


def load_municipalities(df, city_mapping, parties):
    df_raw_municipalities = pd.read_csv(
        os.path.join(CURRENT_DIR, "municipality.csv"),
        sep=";",
    )

    # Filter out rows with NaN in 'municipality_id'
    df = df[df["municipality_id"].notna()]

    if df.empty:
        raise ValueError("No municipalities to load. Please check the input data.")

    for row in tqdm(df.itertuples(), desc="Loading municipalities", total=len(df)):
        # Find the municipality ID from the raw data
        municipality_row = df_raw_municipalities[
            df_raw_municipalities["id"] == row.municipality_id
        ]

        if municipality_row.empty:
            raise ValueError(f"Municipality ID {row.municipality_id} not found.")

        # Find the new city ID from the mapping
        for city in city_mapping:
            if city["old_city_id"] == municipality_row.iloc[0]["city_id"]:
                city_id = city["new_city_id"]
                break
        else:
            raise ValueError(f"City ID {row.city_id} not found in city mapping.")

        response = requests.post(
            f"http://localhost:8000/api/parishes/",
            json={
                "name": row.name,
                "freguesias_pt_url": row.freguesias_pt_url,
                "freguesias_pt_id": row.freguesias_pt_id,
                "address": row.address if pd.notna(row.address) else None,
                "email": row.email if pd.notna(row.email) else None,
                "phone": row.phone if pd.notna(row.phone) else None,
                "city_id": city_id,
                "website": row.website if pd.notna(row.website) else None,
            },
        )
        response.raise_for_status()


if __name__ == "__main__":
    parties = load_parties()

    district_mapping = load_districts(df)

    city_mapping = load_cities(df, district_mapping, parties)

    load_municipalities(df, city_mapping, parties)
