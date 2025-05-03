import React, { useState, useEffect } from 'react'
import { LineChart } from '@mui/x-charts/LineChart';

const PlotHistory = ({ elections }) => {
    const [xAxis, setXAxis] = useState([]);
    const [series, setSeries] = useState([]);

    // Generate yAxis values from 0 to 100 with step of 5
    const yAxis = Array.from({ length: 21 }, (_, i) => i * 5);

    useEffect(() => {
        if (!elections) return;

        // Sort elections by year and extract years for xAxis
        const sortedElections = [...elections].sort((a, b) => a.year - b.year);
        setXAxis(sortedElections.map(election => election.year));

        // Find all unique parties
        const parties = new Set();
        sortedElections.forEach(election => {
            election.election_results.forEach(result => parties.add(result.party));
        });

        // Create series for each party
        const newSeries = Array.from(parties).map(party => ({
            data: sortedElections.map(election => {
                const result = election.election_results.find(r => r.party === party);
                return result ? result.number_votes : null;
            }),
            label: party,
            connectNulls: true,
        }));

        setSeries(newSeries);

    }, [elections]);

    return (
        <LineChart
            xAxis={[{ data: xAxis, label: 'Eleições Autárquicas', scaleType: 'point' }]}
            yAxis={[{ data: yAxis, label: 'Percentagem de Votos', scaleType: 'linear' }]}
            series={series}
            height={300}
        />
    );
};

export default PlotHistory;
