import React, { useState, useEffect } from 'react'
import { useParams } from 'react-router-dom';
import { sendRequest } from '../utils';
import GenericLayout from '../layouts/GenericLayout';
import { Grid } from '@mui/material';
import TableElection from '../components/table/TableElection';
import PlotElection from '../components/plot/PlotElection';
import { Slider } from '@mui/material';
import TableElectionMetadata from '../components/table/TableElectionMetadata';
import LocalMap from '../components/maps/LocalMap';
import ElectionMap from '../components/maps/ElectionMap';

const Election = (props) => {
    const { type, name, year } = useParams();
    const [election, setElection] = useState(null);
    const [electionYears, setElectionYears] = useState([]);
    const [yearToCompare, setyearToCompare] = useState(null);
    const [otherElection, setOtherElection] = useState(null);
    const [nullOption, setNullOption] = useState(null);
    const [totalNumberVotes, setTotalNumberVotes] = useState(0);

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

    console.log(election);

    console.log(totalNumberVotes);
    

    return (
        <GenericLayout main={
            <Grid container direction="column">
                <Grid item>
                    <h1>Eleição de {year} em {name}</h1>
                </Grid>
                <Grid item container direction="row" sx={{ justifyContent: "space-around", alignItems:"center", mt: 3, }}>
                    <Grid item sx={{ alignItems: "center" }} size={{ xs: 12, md: 7 }}>
                        <TableElection election={election} totalNumberVotes={totalNumberVotes} />
                    </Grid>
                    <Grid item container direction="column" sx={{ justifyContent: "center", alignItems: "center" }} size={{ xs: 12, md: 4 }}>
                        <Grid item size={{ xs: 12 }}>
                            <ElectionMap />
                        </Grid>
                        <Grid item>
                            <TableElectionMetadata election={election} totalNumberVotes={totalNumberVotes} />
                        </Grid>
                    </Grid>
                </Grid>
                <hr />
                <Grid item>
                    <h3>Comparador de Resultados</h3>
                </Grid>
                <Grid item container direction="row" sx={{ mt: 5, justifyContent: "center", alignItems: "center" }}>
                    <Grid item container direction="column" size={{ xs: 12, md: 8 }}>
                        <Grid item>
                            <h4>{year}</h4>
                        </Grid>
                        <Grid item size={{ xs: 12, md: "auto" }}>
                            <PlotElection />
                        </Grid>
                        {otherElection &&
                            <>
                                <hr />
                                <Grid item>
                                    <h4>{yearToCompare}</h4>
                                </Grid>
                            </>
                        }
                        {otherElection && <Grid item size={{ xs: 12, md: "auto" }}>
                            <PlotElection />
                        </Grid>}
                    </Grid>
                    <Grid item size={{ xs: 2 }}>                        
                        <Grid item sx={{ mt: 3, justifyContent: "center" }} size={{ xs: 12 }}>
                            {electionYears.length > 0 && (
                                <Slider
                                    defaultValue={Math.max(...electionYears) + 4}
                                    step={null}
                                    marks={[
                                        { value: Math.max(...electionYears) + 4, label: "Não Comparar" },
                                        ...electionYears.map(year => ({ value: year, label: year }))
                                    ]}
                                    orientation="vertical"
                                    min={Math.min(...electionYears)}
                                    max={Math.max(...electionYears) + 4}
                                    valueLabelDisplay="auto"
                                    onChange={(event, value) => {
                                        if (value) {
                                            handleElectionChange(value);
                                        }
                                    }}
                                    sx={{ height: "400px" }}
                                />
                            )}
                        </Grid>
                    </Grid>
                </Grid>
                <hr />
                <Grid item>
                    <h3>As notícias locais sobre a Eleição de {year}</h3>
                </Grid>
            </Grid>
        } />
    )
}

export default Election
