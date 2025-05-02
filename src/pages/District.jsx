import React, { useEffect, useState } from 'react'
import { useParams } from 'react-router-dom';
import { _constructElections, sendRequest } from '../utils';
import GenericLayout from '../layouts/GenericLayout';
import Grid from '@mui/material/Grid';
import LocalMap from '../components/maps/LocalMap';
import PlotNumberCities from '../components/plot/PlotNumberCities';
import TableDistrict from '../components/table/TableDistrict';
import CardWikipedia from '../components/card/CardWikipedia';
import SliderDistrict from '../components/slider/SliderDistrict';
import PlotVotersDistrict from '../components/plot/PlotVotersDistrict';

const District = (props) => {

    const { name } = useParams();
    const [district, setDistrict] = useState(null);
    const [electionYears, setElectionYears] = useState([]);
    const [selectedElectionYear, setSelectedElectionYear] = useState(null);

    const fetchElectionYears = async (name) => {
        const response = await sendRequest(
            `${process.env.REACT_APP_ENDPOINT}/elections/years/`,
            "GET"
        );

        setElectionYears(response);
        setSelectedElectionYear(response[0]);
    }

    // Fetch districts from the API
    const fetchDistrict = async (name) => {
        const response = await sendRequest(
            `${process.env.REACT_APP_ENDPOINT}/districts/${name.trim()}`,
            "GET"
        );

        setDistrict(response);
    };


    useEffect(() => {
        fetchDistrict(name).catch((error) => {
            console.error('Error fetching district:', error);
        });

        fetchElectionYears(name).catch((error) => {
            console.error('Error fetching election years:', error);
        });
    }, []);

    return (
        <GenericLayout
            main={
                <Grid container direction="column" >
                    <Grid item container direction="row" sx={{ my: { xs: 3, md: 5 }, justifyContent: "space-around" }}>
                        <Grid item size={{ xs: 0, md: 4 }} >
                            <LocalMap geo_polygon={district?.geo_polygon} polygon_centroid={district?.polygon_centroid} />
                        </Grid>
                        <Grid item container direction="column" size={{ xs: 12, md: 7 }}>
                            <Grid item>
                                <CardWikipedia wikipedia={district?.wikipedia} />
                            </Grid>
                            <Grid item sx={{ mt: 2 }}>
                                <h4>Variação no Número de Eleitores em Aveiro Desde 1974:</h4>
                            </Grid>
                            <Grid item sx={{ alignItems: { md: "center" } }}>
                                <PlotVotersDistrict cities={district?.cities} electionYears={electionYears} />
                            </Grid>
                        </Grid>
                        {/* Map only for the smaller screens */}
                        <Grid item size={{ xs: 12, md: 0 }} >
                            <LocalMap />
                        </Grid>
                    </Grid>
                    <hr />
                    <Grid item>
                        <h2>Resultados Autárquicos nas Concelhias de {district?.name}:</h2>
                    </Grid>
                    <Grid item container direction="row" sx={{ alignItems: "center", justifyContent: "space-around" }}>
                        <Grid item size={{ sx: 12, md: 7 }}>
                            <TableDistrict cities={district?.cities} selectedElectionYear={selectedElectionYear} />
                        </Grid>
                        <Grid item container direction="column" size={{ xs: 12, md: 5 }} sx={{ alignItems: "center", justifyContent: "center" }}>
                            <Grid item size={{ xs: 10 }} sx={{ mx: "auto" }}>
                                <SliderDistrict electionYears={electionYears} setSelectedElectionYear={setSelectedElectionYear} />
                            </Grid>
                            <Grid item size={{ xs: 12 }}>
                                <PlotNumberCities yAxisLabel={"Número de Câmaras Municipais"} cities={district?.cities} electionYears={electionYears} selectedElectionYear={selectedElectionYear} />
                            </Grid>
                        </Grid>
                    </Grid>
                </Grid>
            }
        />
    )
}

export default District