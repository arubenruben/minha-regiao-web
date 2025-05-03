import React, { useState, useEffect } from 'react'
import { useParams } from 'react-router-dom';
import { sendRequest } from '../utils';
import GenericLayout from '../layouts/GenericLayout';
import { Grid } from '@mui/material';
import PlotElection from '../components/plot/PlotElection';
import CardNews from '../components/card/CardNews';
import SliderElection from '../components/slider/SliderElection';
import ListElectionType from '../components/list/ListElectionType';

const Election = (props) => {
    const { type, name, year } = useParams();
    const [election, setElection] = useState(null);
    const [electionYears, setElectionYears] = useState(null);
    const [yearToCompare, setYearToCompare] = useState(null);
    const [selectedFilter, setSelectedFilter] = useState("promises");

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
            `${process.env.REACT_APP_ENDPOINT}/elections/years/`,
            "GET"
        );

        // Sort years in descending order

        setElectionYears(response.filter(elem => elem !== parseInt(year)));
    }

    useEffect(() => {
        fetchElection(type, name, year);
        fetchElectionYears();
    }, []);

    return (
        <GenericLayout main={
            <Grid container direction="column">
                <Grid item>
                    <h1>Eleição de {year} em {name}</h1>
                </Grid>
                <Grid item container direction="row" sx={{ mt: 5, justifyContent: "center", alignItems: "center" }}>
                    <Grid item container direction="column" size={{ xs: 12, md: 8 }}>
                        <Grid item size={{ xs: 12, md: "auto" }}>
                            <PlotElection
                                election={election}
                                name={name}
                                type={type}
                                yearToCompare={yearToCompare}
                                year={year}
                            />
                            {electionYears && <SliderElection electionYears={electionYears} setYearToCompare={setYearToCompare} />}
                        </Grid>
                    </Grid>
                </Grid>
                <hr />
                <Grid item>
                    <h3>As notícias locais em {name} sobre a Eleição de {year}</h3>
                </Grid>
                <Grid item container direction="row" sx={{ mt: 5 }} spacing={4}>
                    <Grid item size={{ md: 3 }}>
                        <ListElectionType setSelectedFilter={setSelectedFilter} />
                    </Grid>
                    <Grid item container direction="row" size={{ md: 9 }} sx={{ justifyContent: "center" }}>
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