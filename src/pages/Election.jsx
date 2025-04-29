import React, { useState, useEffect } from 'react'
import { useParams } from 'react-router-dom';
import { sendRequest } from '../utils';
import GenericLayout from '../layouts/GenericLayout';
import { Grid } from '@mui/material';
import TableElection from '../components/table/TableElection';
import PlotElection from '../components/plot/PlotElection';
import { Slider } from '@mui/material';

const Election = (props) => {
    const { type, name, year } = useParams();
    const [election, setElection] = useState(null);
    const [electionYears, setElectionYears] = useState([]);
    const [yearToCompare, setyearToCompare] = useState(null);
    const [otherElection, setOtherElection] = useState(null);

    const nullOption = Math.max(...electionYears) + 4

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
        const filteredYears = response.filter((year) => year !== election?.year);

        // Sort years in descending order
        filteredYears.sort((a, b) => b - a);

        setElectionYears(filteredYears);
    }

    useEffect(() => {
        fetchElection(type, name, year);
        fetchElectionYears(name);
    }, []);

    const handleChange = (event, value) => {
        console.log(value);

        if (value === null)
            return;

        if (value === nullOption) {
            setyearToCompare(null);
            return;
        }

        setyearToCompare(value);
    }

    const handleElectionChange = async () => {
        if (yearToCompare === null) {
            setOtherElection(null);
            return;
        }

        setOtherElection(fetchElection(
            type,
            name,
            yearToCompare
        ));
    }

    // Call handleElectionChange whenever yearToCompare changes
    useEffect(() => {
        handleElectionChange();
    }, [yearToCompare]);


    return (
        <GenericLayout main={
            <Grid container direction="column">
                <Grid item>
                    <h1>Eleição de {year} em {name}</h1>
                </Grid>
                <Grid item>
                    <TableElection />
                </Grid>
                <Grid item container direction="row" sx={{ mt: 5, justifyContent: "center", alignItems: "center" }}>
                    <Grid item container direction="column" size={{ xs: 12, md: 8 }}>
                        <Grid item>
                            <h6>{year}</h6>
                        </Grid>
                        <Grid item size={{ xs: 12, md: "auto" }}>
                            <PlotElection />
                        </Grid>
                        {otherElection &&
                            <>
                                <hr />
                                <Grid item>
                                    <h6>{yearToCompare}</h6>
                                </Grid>
                            </>
                        }
                        {otherElection && <Grid item size={{ xs: 12, md: "auto" }}>
                            <PlotElection />
                        </Grid>}
                    </Grid>
                    <Grid item container direction="column" size={{ xs: 2 }}>
                        <Grid item>
                            <h5>Comparar com Eleição de:</h5>
                        </Grid>
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
                                    onChange={handleChange}
                                    sx={{ height: "400px" }}
                                />
                            )}
                        </Grid>
                    </Grid>
                </Grid>
            </Grid>
        } />
    )
}

export default Election
