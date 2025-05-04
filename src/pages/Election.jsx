import React, { useState, useEffect } from 'react'
import { useParams } from 'react-router-dom';
import { sendRequest } from '../utils';
import GenericLayout from '../layouts/GenericLayout';
import { Grid } from '@mui/material';
import PlotElection from '../components/plot/PlotElection';
import CardNews from '../components/card/CardNews';
import SliderElection from '../components/slider/SliderElection';
import ListElectionType from '../components/list/ListElectionType';
import TableElectionMetadata from '../components/table/TableElectionMetadata';
import { Link } from 'react-router-dom';
import Breadcrumbs from '@mui/material/Breadcrumbs';

const Election = (props) => {
    const { type, name, year } = useParams();
    const [election, setElection] = useState(null);
    const [electionYears, setElectionYears] = useState(null);
    const [yearToCompare, setYearToCompare] = useState(null);
    const [selectedFilter, setSelectedFilter] = useState("promises");
    const [electionToCompare, setElectionToCompare] = useState(null);

    const fetchElection = async (type, name, year) => {
        let endpoint = null;

        if (type === "freguesia") {
            endpoint = `${process.env.REACT_APP_ENDPOINT}/elections/municipality/${name}/${year}`;
        }

        else if (type === "cidade") {
            endpoint = `${process.env.REACT_APP_ENDPOINT}/elections/city/${name}/${year}`;
        }

        const response = await sendRequest(
            endpoint,
            "GET"
        );

        setElection(response);
    }

    const fetchElectionYears = async () => {
        const response = await sendRequest(
            `${process.env.REACT_APP_ENDPOINT}/elections/years?name=${name}`,
            "GET"
        );

        // Sort years in descending order
        setElectionYears(response.filter(elem => elem !== parseInt(year)));
    }

    useEffect(() => {
        fetchElection(type, name, year);
        fetchElectionYears();
    }, []);

    const breadCrumbs = [
        <Link key="1" to="/">
            Ínicio
        </Link>,
        <Link key="2" to={`/${type}/${name}`}>{name}</Link>,
        <span key="3">Eleições</span>,
        <span key="4">{year}</span>
    ]

    return (
        <GenericLayout main={
            <Grid container direction="column" sx={{ mx: 5, mt: 3 }}>
                <Grid item container direction="row" sx={{ alignItems: "center", mt: 2 }}>
                    <Grid item>
                        <Breadcrumbs separator=">" sx={{ mb: 2 }}>
                            {breadCrumbs}
                        </Breadcrumbs>
                    </Grid>
                </Grid>
                <Grid item>
                    <h2>Eleição de {year} em {name}</h2>
                    <p className="ssn-subtitle">Compara os resultados dos partidos</p>
                </Grid>
                <Grid item container direction="row" sx={{ mt: 5, justifyContent: "space-around" }}>
                    <Grid item container direction="column" size={{ xs: 12, md: 7 }}>
                        <Grid item>
                            <PlotElection
                                election={election}
                                name={name}
                                type={type}
                                yearToCompare={yearToCompare}
                                year={year}
                                electionToCompare={electionToCompare}
                                setElectionToCompare={setElectionToCompare}
                            />
                            {electionYears && <SliderElection electionYears={electionYears} setYearToCompare={setYearToCompare} />}
                        </Grid>
                    </Grid>
                    <Grid item size={{ xs: 12, md: 4.5 }} >
                        <TableElectionMetadata election={election} electionToCompare={electionToCompare} year={year} yearToCompare={yearToCompare} />
                    </Grid>
                </Grid>
                <hr />
                <Grid item>
                    <h3>As notícias locais em {name} sobre a Eleição de {year}</h3>
                    <p className="ssn-subtitle">Quais os temas falados nos jornais locais da região no período eleitoral?</p>
                </Grid>
                <Grid item container direction="row" sx={{ mt: 5 }} spacing={4}>
                    <Grid item size={{ md: 3 }}>
                        <ListElectionType setSelectedFilter={setSelectedFilter} />
                    </Grid>
                    <Grid item container direction="row" size={{ md: 9 }} sx={{ justifyContent: "center", alignItems: "center" }}>
                        {election?.news?.map((news, index) => {
                            if (news.topic === selectedFilter) {
                                return (
                                    <Grid item key={index} size={{ xs: 12, md: 6 }} sx={{ mb: 2 }}>
                                        <CardNews news={news} />
                                    </Grid>
                                )
                            }
                        })}
                        {election?.news?.filter(news => news.topic === selectedFilter).length === 0 && <Grid item size={{ xs: 12 }} sx={{ textAlign: "center" }}>
                            <h4>Não existem notícias disponíveis para o filtro selecionado.</h4>
                        </Grid>}
                    </Grid>
                </Grid>
            </Grid >
        } />
    )
}

export default Election