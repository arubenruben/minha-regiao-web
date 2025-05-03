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
    const [electionYears, setElectionYears] = useState([]);
    const [yearToCompare, setyearToCompare] = useState(null);
    const [otherElection, setOtherElection] = useState(null);
    const [nullOption, setNullOption] = useState(null);
    const [totalNumberVotes, setTotalNumberVotes] = useState(0);
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

        // Remove year from the list of years
        const filteredYears = response.filter((elem) => elem != year);

        // Sort years in descending order
        filteredYears.sort((a, b) => b - a);

        setElectionYears(filteredYears);

        setNullOption(Math.max(...filteredYears) + 4);

    }

    const fetchOtherElection = async (type, name, year) => {
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

        setOtherElection(response);
    }

    const setTotalVotes = (election) => {
        if (!election || !election.election_results) {
            return 0;
        }

        const totalVotes = election.election_results.reduce((acc, result) => {
            return acc + result.number_votes;
        }, 0);

        setTotalNumberVotes(totalVotes + election.number_blank_votes + election.number_null_votes);

    }

    useEffect(() => {
        fetchElection(type, name, year);
        fetchElectionYears();
    }, []);

    useEffect(() => {
        if (election) {
            setTotalVotes(election);
        }
    }, [election]);


    const handleElectionChange = async (value) => {

        if (!value)
            return;

        setyearToCompare(value);


        if (value === nullOption) {
            setOtherElection(null);
            return;
        }

        fetchOtherElection(type, name, value)
    }

    return (
        <GenericLayout main={
            <Grid container direction="column">
                <Grid item>
                    <h1>Eleição de {year} em {name}</h1>
                </Grid>
                <Grid item container direction="row" sx={{ mt: 5, justifyContent: "center", alignItems: "center" }}>
                    <Grid item container direction="column" size={{ xs: 12, md: 8 }}>
                        <Grid item size={{ xs: 12, md: "auto" }}>
                            <PlotElection />
                            <SliderElection electionYears={electionYears} handleElectionChange={handleElectionChange} nullOption={nullOption} yearToCompare={yearToCompare} setyearToCompare={setyearToCompare} setOtherElection={setOtherElection} setNullOption={setNullOption} />
                        </Grid>
                    </Grid>
                </Grid>
                <hr />
                <Grid item>
                    <h3>As notícias locais em {name} sobre a Eleição de {year}</h3>
                </Grid>
                <Grid item container direction="row" sx={{ mt: 5, height: "100%" }} spacing={4}>
                    <Grid item size={{ md: 3 }}>
                        <ListElectionType setSelectedFilter={setSelectedFilter} />
                    </Grid>
                    <Grid item container direction="row" size={{ md: 8 }}>
                        <Grid item>
                            {election?.news.map((news, index) => {
                                return (
                                    <Grid item key={index} size={{ xs: 12, md: 5 }}>
                                        <CardNews news={news} selectedFilter={selectedFilter} />
                                    </Grid>
                                )
                            })}
                        </Grid>
                    </Grid>
                </Grid>
            </Grid>
        } />
    )
}

export default Election
