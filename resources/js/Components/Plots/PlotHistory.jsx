import React, { useMemo } from 'react'
import { LineChart } from '@mui/x-charts/LineChart';

const PlotHistory = ({ elections }) => {
    // Generate yAxis values from 0 to 100 with step of 5
    const yAxis = Array.from({ length: 21 }, (_, i) => i * 5);

    const { xAxis, series } = useMemo(() => {
        if (!elections) return { xAxis: [], series: [] };

        // Sort elections by year and extract years for xAxis
        const sortedElections = [...elections].sort((a, b) => a.year - b.year);
        const xAxisData = sortedElections.map(election => election.year);

        // Find all unique parties
        const parties = new Set();
        sortedElections.forEach(election => {
            election.election_results.forEach(result => parties.add(result.party.acronym));
        });

        // Create series for each party
        const seriesData = Array.from(parties).map(party => ({
            data: sortedElections.map(election => {
                const result = election.election_results.find(r => r.party.acronym === party);
                return result ? parseFloat(result[0].percentage_votes).toFixed(2) : null;
            }),
            label: party,
            connectNulls: true,
        }));

        return { xAxis: xAxisData, series: seriesData };
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
