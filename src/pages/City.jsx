import React, { useEffect, useState } from 'react'
import { Grid } from '@mui/material';
import { useParams } from 'react-router-dom';
import GenericLayout from '../layouts/GenericLayout';
import { sendRequest } from '../utils';
import LocalMap from '../components/maps/LocalMap';
import CardWikipedia from '../components/card/CardWikipedia';
import PlotVoters from '../components/plot/PlotVoters';
import TableCity from '../components/table/TableCity';
import TableCityHistoric from '../components/table/TableCityHistoric';
import { Link } from 'react-router-dom';
import NorthWestIcon from '@mui/icons-material/NorthWest';
import CardPresident from '../components/card/CardPresident';
import { Slider } from '@mui/material';
import PlotNumberCities from '../components/plot/PlotNumberCities';
import PlotElection from '../components/plot/PlotHistory';
import Fab from '@mui/material/Fab';

const City = (props) => {
    const [city, setCity] = useState(null);

    const [electionYears, setElectionYears] = useState([]);
    const [selectedElectionYear, setSelectedElectionYear] = useState(null);
    const [electionsWithPresident, setElectionsWithPresident] = useState([]);

    const { name } = useParams();

    const fetchCity = async (name) => {
        const response = await sendRequest(
            `${process.env.REACT_APP_ENDPOINT}/cities/${name.trim()}`,
            "GET"
        );

        setCity(response);
    }

    const fetchElectionYears = async (name) => {
        const response = await sendRequest(
            `${process.env.REACT_APP_ENDPOINT}/elections/years/`,
            "GET"
        );

        setElectionYears(response);
        setSelectedElectionYear(response[0]);
    }

    useEffect(() => {
        fetchCity(name);
        fetchElectionYears(name);
    }, []);

    useEffect(() => {
        if (city) {
            setElectionsWithPresident(city?.elections.filter(election => election.president));
        }
    }, [city]);

    return (
        <GenericLayout main={
            <Grid container direction="column">
                <Grid item container direction="row" sx={{ alignItems: "center", mt: 2, ml: 2 }}>
                    <Grid item>
                        <span>
                            <NorthWestIcon sx={{ fontSize: 20 }} />
                            <Link to={`/district/${city?.district?.name}`}>
                                Voltar para a Página do Distrito{city?.district?.name}
                            </Link>
                        </span>
                    </Grid>
                </Grid>
                <Grid item container direction="row" sx={{ justifyContent: "space-around", mt: 3, mb: 5 }}>
                    <Grid item container direction="column" size={{ xs: 7 }}>
                        <Grid item>
                            <CardWikipedia wikipedia={city?.wikipedia} />
                        </Grid>
                        <hr />
                        <Grid item sx={{ mt: 2 }}>
                            <h4>Variação no Número de Eleitores em {city?.name} Desde 1974:</h4>
                        </Grid>
                        <Grid item sx={{ alignItems: "center" }}>
                            <PlotVoters localities={city?.municipalities} electionYears={electionYears} />
                        </Grid>
                    </Grid>
                    <Grid item size={{ xs: 4 }} >
                        <LocalMap />
                    </Grid>
                </Grid>
                <hr />
                <Grid item>
                    <h3>Histórico na Câmara Municipal</h3>
                </Grid>
                <Grid container item direction="row" sx={{ alignItems: "center" }}>
                    <Grid item size={{ xs: 7 }}>
                        <TableCityHistoric name={city?.name} elections={city?.elections} endpoint={"cidade"} />
                    </Grid>
                    <Grid item size={{ xs: 5 }}>
                        <PlotElection />
                    </Grid>
                </Grid>
                <Grid item sx={{ mt: 3 }}>
                    <h3>Os Presidentes de Câmara:</h3>
                </Grid>
                <Grid item container direction="row" sx={{ justifyContent: "space-around", alignItems: "center", mt: 3 }}>
                    {electionsWithPresident.map((election, index) => {
                        return (
                            <Grid item size={{ xs: 2 }} key={index} >
                                <CardPresident election={election} />
                            </Grid>
                        )
                    })}
                </Grid>
                <hr />
                <Grid item>
                    <h2>Resumo Autárquico na Concelhia:</h2>
                </Grid>
                <Grid item container direction="row" sx={{ alignItems: "center", justifyContent: "space-around" }}>
                    <Grid item size={{ xs: 7 }}>
                        <TableCity municipalities={city?.municipalities} selectedElectionYear={selectedElectionYear} />
                    </Grid>
                    <Grid item container direction="column" size={{ xs: 5 }} sx={{ alignItems: "center", justifyContent: "center" }}>
                        <Grid item size={{ xs: 10 }} sx={{ mx: "auto" }}>
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
                            <PlotNumberCities yAxisLabel={"Número de Juntas de Freguesia"} cities={city?.municipalities} electionYears={electionYears} selectedElectionYear={selectedElectionYear} />
                        </Grid>
                    </Grid>
                </Grid>

            </Grid>
        } />
    )
}

export default City