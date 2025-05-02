import React, { useEffect, useState } from 'react'
import { useParams } from 'react-router-dom';
import { _constructElections, sendRequest } from '../utils';
import GenericLayout from '../layouts/GenericLayout';
import Grid from '@mui/material/Grid';
import LocalMap from '../components/maps/LocalMap';
import PlotNumberCities from '../components/plot/PlotNumberCities';
import TableDistrict from '../components/table/TableDistrict';
import SliderDistrict from '../components/slider/SliderDistrict';
import PlotVotersDistrict from '../components/plot/PlotVotersDistrict';
import AccordionWikipedia from '../components/accordion/AccordionWikipedia';

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
                    <Grid item container direction="row" sx={{ mt: 3, justifyContent: "space-around" }}>
                        <Grid item size={{ xs: 0, md: 4 }} >
                            <LocalMap
                                localities={district?.cities}
                                polygon_centroid={district?.polygon_centroid}
                                endpoint={"cidade"}
                            />
                        </Grid>
                        <Grid item container direction="column" size={{ xs: 12, md: 7 }}>
                            <Grid item>
                                <AccordionWikipedia wikipedia={district?.wikipedia} />
                            </Grid>
                            <hr />
                            <Grid item sx={{ mt: 2 }}>
                                <h4>Número de Eleitores em {district?.name} Desde 1974:</h4>
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
                    <Grid item>
                        <h2>Resultados Autárquicos nas Concelhias de {district?.name}:</h2>
                    </Grid>
                    <Grid item container direction="row" sx={{ justifyContent: "space-around" }}>
                        <Grid item container direction="column" size={{ xs: 12, md: 5 }}>
                            <Grid item size={{ xs: 10 }} sx={{ mx: "auto", mt: 3 }}>
                                <SliderDistrict electionYears={electionYears} setSelectedElectionYear={setSelectedElectionYear} />
                            </Grid>
                            <Grid item size={{ xs: 12 }} sx={{ mt: 3 }}>
                                <PlotNumberCities yAxisLabel={"Número de Câmaras Municipais"} cities={district?.cities} electionYears={electionYears} selectedElectionYear={selectedElectionYear} />
                            </Grid>
                        </Grid>
                        <Grid item size={{ sx: 12, md: 7 }}>
                            <TableDistrict cities={district?.cities} selectedElectionYear={selectedElectionYear} />
                        </Grid>
                    </Grid>
                </Grid>
            }
        />
    )
}

export default District