import React, { useEffect, useState } from 'react'
import { useParams } from 'react-router-dom';
import { sendRequest } from '../utils';
import GenericLayout from '../layouts/GenericLayout';
import Grid from '@mui/material/Grid';
import LocalMap from '../components/maps/LocalMap';
import PlotVoters from '../components/plot/PlotVoters';
import { Divider, Slider } from '@mui/material';
import PlotNumberCities from '../components/plot/PlotNumberCities';
import TableDistrict from '../components/table/TableDistrict';
import CardWikipedia from '../components/card/CardWikipedia';


const District = (props) => {

    const { name } = useParams();

    const [district, setDistrict] = useState(null);
    const [electionYears, setElectionYears] = useState([]);
    const [selectedElectionYear, setSelectedElectionYear] = useState(null);

    // Fetch districts from the API
    const fetchDistrict = async (name) => {
        const response = await sendRequest(
            `${process.env.REACT_APP_ENDPOINT}/districts/${name.trim()}`,
            "GET"
        );

        setDistrict(response);

        parseElectionYears(response);
    };

    const parseElectionYears = (district) => {
        const electionYears = new Set();

        district?.cities?.forEach(city => {
            city?.elections?.forEach(election => {
                if (election.year)
                    electionYears.add(election.year);
            });
        });

        const sortedYears = Array.from(electionYears).sort((a, b) => b - a)

        // Sort the election years
        setSelectedElectionYear(sortedYears[0]);
        setElectionYears(sortedYears);
    };

    useEffect(() => {
        fetchDistrict(name).catch((error) => {
            console.error('Error fetching district:', error);
        });
    }, []);

    return (
        <GenericLayout
            main={
                <Grid container direction="column">
                    <Grid item>
                        <h1>Distrito: {district?.name}</h1>
                    </Grid>
                    <Grid item container direction="row" sx={{ justifyContent: "space-around", mb: 5 }}>
                        <Grid item size={{ xs: 5 }} >
                            <LocalMap />
                        </Grid>
                        <Grid item container direction="column" sx={{ alignItems: "center" }} size={{ xs: 6 }}>
                            <Grid item>
                                <CardWikipedia wikipedia={district?.wikipedia} />
                            </Grid>
                            <Grid item>
                                <PlotVoters name={district?.name} elections={district?.elections} />
                            </Grid>
                        </Grid>
                    </Grid>
                    <hr />
                    <Grid item>
                        <h2>Eleições Autárquicas em {district?.name}</h2>
                    </Grid>
                    <Grid item container direction="row" sx={{ alignItems: "center" }}>
                        <Grid item container direction="row" sx={{ alignItems: "center" }}>
                            <Grid item size={{ xs: 6 }}>
                                <TableDistrict cities={district?.cities} selectedElectionYear={selectedElectionYear} />
                            </Grid>
                            <Grid item size={{ xs: 1 }} sx={{ height: "400px"}}>
                                <Slider
                                    defaultValue={electionYears[0]}
                                    step={null}
                                    marks={electionYears.map(year => ({ value: year, label: year }))}
                                    orientation="vertical"
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
                            <Grid item size={{ xs: 5 }}>
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