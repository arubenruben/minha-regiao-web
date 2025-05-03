import React, { useState, useEffect } from 'react';
import { BarChart } from '@mui/x-charts/BarChart';
import { sendRequest } from '../../utils';

const PlotElection = ({ type, name, yearToCompare, election, year }) => {
    const [electionToCompare, setElectionToCompare] = useState(null);
    const [xAxis, setXAxis] = useState([]);
    const [series, setSeries] = useState([]);

    // Fetch the comparison election when needed
    useEffect(() => {
        if (!yearToCompare) {
            setElectionToCompare(null);
            return;
        }
        const fetchElection = async () => {
            const endpoint =
                type === 'freguesia'
                    ? `${process.env.REACT_APP_ENDPOINT}/elections/municipality/${name}/${yearToCompare}`
                    : `${process.env.REACT_APP_ENDPOINT}/elections/city/${name}/${yearToCompare}`;
            const resp = await sendRequest(endpoint, 'GET');
            setElectionToCompare(resp);
        };
        fetchElection();
    }, [type, name, yearToCompare]);

    // Build chart data whenever either election changes
    useEffect(() => {
        if (!election) return;

        // If no compare data, just one series
        if (!electionToCompare) {
            const parties = election.election_results.map(r => r.party);
            setXAxis(parties);
            setSeries([
                {
                    data: election.election_results.map(r => r.number_votes),
                    label: `Votantes (${year})`,
                    id: 'voters',
                },
            ]);
            return;
        }

        // 1. Gather all party names
        const partiesSet = new Set();
        election.election_results.forEach(r => partiesSet.add(r.party));
        electionToCompare.election_results.forEach(r => partiesSet.add(r.party));
        const parties = Array.from(partiesSet);

        // 2. Align data arrays
        const currentData = parties.map(p =>
            (election.election_results.find(r => r.party === p)?.number_votes) || 0
        );
        const comparedData = parties.map(p =>
            (electionToCompare.election_results.find(r => r.party === p)?.number_votes) || 0
        );

        // 3. Update state
        setXAxis(parties);
        setSeries([
            { data: currentData, label: `(${year})`, id: 'current' },
            { data: comparedData, label: `(${yearToCompare})`, id: 'compare' },
        ]);
    }, [election, electionToCompare, year, yearToCompare]);

    return (
        <BarChart
            height={300}
            xAxis={[{ data: xAxis }]}
            series={series}
            yAxis={[{ width: 50 }]}
        />
    );
};

export default PlotElection;
