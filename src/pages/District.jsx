import React, { useEffect, useState } from 'react'
import { useParams } from 'react-router-dom';
import { sendRequest } from '../utils';
import GenericLayout from '../layouts/GenericLayout';
import Grid from '@mui/material/Grid';
import LocalMap from '../components/maps/LocalMap';
import PlotVoters from '../components/plot/PlotVoters';
import { Slider } from '@mui/material';
import PlotNumberCities from '../components/plot/PlotNumberCities';
import TableDistrict from '../components/table/TableDistrict';
import CardWikipedia from '../components/card/CardWikipedia';
import Fab from '@mui/material/Fab';

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
                    <Grid item container direction="row" sx={{ my: 5, justifyContent: "space-around" }}>
                        <Grid item size={{ xs: 4}} >
                            <LocalMap />
                        </Grid>
                        <Grid item container direction="column" size={{ xs: 7 }}>
                            <Grid item>
                                <CardWikipedia wikipedia={district?.wikipedia} />
                            </Grid>
                            <hr />
                            <Grid item>
                                <h3>Eleitores:</h3>
                            </Grid>
                            <Grid item sx={{ alignItems: "center" }}>
                                <PlotVoters name={district?.name} elections={district?.elections} />
                            </Grid>
                        </Grid>
                    </Grid>
                    <hr />
                    <Grid item>
                        <h2>Resumo Autárquico no Distrito:</h2>
                    </Grid>
                    <Grid item container direction="row" sx={{ alignItems: "center", justifyContent: "space-around" }}>
                        <Grid item size={{ xs: 7 }}>
                            <TableDistrict cities={district?.cities} selectedElectionYear={selectedElectionYear} />
                        </Grid>
                        <Grid item container direction="column" size={{ xs: 5 }} sx={{ alignItems: "center", justifyContent: "center" }}>
                            <Grid item size={{ xs: 10 }} sx={{mx: "auto"}}>
                                <Slider
                                    defaultValue={electionYears[0]}
                                    step={null}
                                    marks={electionYears.map(year => ({ value: year, label: year }))}
                                    min={Math.min(...electionYears)}
                                    max={Math.max(...electionYears)}
                                    valueLabelDisplay="auto"
                                    onChange={(event, value) => {
                                        if (value) {
                                            setSelectedElectionYear(value);
                                        }
                                    }}
                                />
                            </Grid>
                            <Grid item size={{ xs: 12 }}>
                                <PlotNumberCities
                                    name={district?.name}
                                    elections={district?.elections}
                                    selectedElectionYear={selectedElectionYear}
                                />
                            </Grid>
                        </Grid>
                    </Grid>
                </Grid>
            }
        />
    )
}

export default District

/*

Mapa de Braga com os concelhos

Var chart com timeline do número de cameras municipais por partido usar https://mui.com/material-ui/react-chip/

Espetar com o Wikipedia

Fazer um line chart com o numero de eleitores por ano

*/