import React, { useEffect, useState } from 'react'
import { Grid } from '@mui/material';
import { useParams } from 'react-router-dom';
import GenericLayout from '../layouts/GenericLayout';
import { sendRequest } from '../utils';
import LocalMap from '../components/maps/LocalMap';
import PlotVoters from '../components/plot/PlotVoters';
import TableCity from '../components/table/TableCity';
import TableCityHistoric from '../components/table/TableCityHistoric';
import { Link } from 'react-router-dom';
import NorthWestIcon from '@mui/icons-material/NorthWest';
import CardPresident from '../components/card/CardPresident';
import { Slider } from '@mui/material';
import PlotNumberCities from '../components/plot/PlotNumberCities';
import PlotHistory from '../components/plot/PlotHistory';
import AccordionWikipedia from '../components/accordion/AccordionWikipedia';
import SliderCity from '../components/slider/SliderCity';

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
            // Sort elections with president by year
            setElectionsWithPresident(prevElections => prevElections.sort((a, b) => b.year - a.year));
        }
    }, [city]);

    console.log("City data:", city);

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
                    <Grid item size={{ xs: 4 }} >
                        <LocalMap
                            localities={city?.municipalities}
                            polygon_centroid={city?.polygon_centroid}
                            endpoint={"freguesia"} />
                    </Grid>
                    <Grid item container direction="column" size={{ xs: 7 }}>
                        <Grid item>
                            <AccordionWikipedia wikipedia={city?.wikipedia} />
                        </Grid>
                        <hr />
                        <Grid item sx={{ mt: 2 }}>
                            <h4>Variação no Número de Eleitores em {city?.name} Desde 1974:</h4>
                        </Grid>
                        <Grid item sx={{ alignItems: "center" }}>
                            <PlotVoters elections={city?.elections} />
                        </Grid>
                    </Grid>
                </Grid>
                <hr />
                <Grid item>
                    <h3>Histórico na Câmara Municipal</h3>
                </Grid>
                <Grid container item direction="column" sx={{ alignItems: "center", mb: 3 }}>
                    <Grid item size={{ xs: 10 }} sx={{ my: 3 }}>
                        <PlotHistory elections={city?.elections} />
                    </Grid>
                    <Grid item size={{ xs: 8 }}>
                        <TableCityHistoric name={city?.name} elections={city?.elections} endpoint={"cidade"} />
                    </Grid>
                </Grid>
                <hr />
                <Grid item>
                    <h2>Resumo Autárquico na Concelhia {city?.name} em {selectedElectionYear}:</h2>
                </Grid>
                <Grid item container direction="row" sx={{ justifyContent: "space-around" }}>
                    <Grid item container direction="column" size={{ xs: 12, md: 5 }}>
                        <Grid item size={{ xs: 10 }} sx={{ mx: "auto", mt: 3 }}>
                            <SliderCity electionYears={electionYears} setSelectedElectionYear={setSelectedElectionYear} />
                        </Grid>
                        <Grid item size={{ xs: 12 }} sx={{ mt: 3 }}>
                            <PlotNumberCities yAxisLabel={"Número de Juntas de Freguesia"} cities={city?.municipalities} electionYears={electionYears} selectedElectionYear={selectedElectionYear} />
                        </Grid>
                    </Grid>
                    <Grid item size={{ sx: 12, md: 7 }}>
                        <TableCity municipalities={city?.municipalities} selectedElectionYear={selectedElectionYear} />
                    </Grid>
                </Grid>
            </Grid>
        } />
    )
}

export default City