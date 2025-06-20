import React, { useMemo } from 'react';
import { BarChart } from '@mui/x-charts/BarChart';

const PlotElection = ({ election, yearToCompare }) => {

    const electionToCompare = useMemo(() => {
        if (!yearToCompare || !election)
            return null;

        return election.other_elections.find(e => e.year === yearToCompare) || null;
    }, [yearToCompare, election]);

    const xAxisData = useMemo(() => {
        if (!election) return [];

        // If no compare data, just one series
        if (!electionToCompare) {
            return election.election_results.map(r => r.party.acronym);
        }

        // 1. Gather all party names
        const partiesSet = new Set();

        election.election_results.forEach(r => partiesSet.add(r.party.acronym));
        electionToCompare.election_results.forEach(r => partiesSet.add(r.party.acronym));

        return Array.from(partiesSet);
    }, [election, electionToCompare]);

    const series = useMemo(() => {
        if (!election)
            return [];

        // If no compare data, just one series
        if (!electionToCompare) {
            return [
                {
                    data: election.election_results.map(r => r[0].percentage_votes),
                    label: `Eleitores (${election.year})`,
                    id: 'voters',
                },
            ];
        }
        // 2. Align data arrays
        const currentData = xAxisData.map(p =>
            (election.election_results.find(r => r.party.acronym === p)?.[0]?.percentage_votes) || 0
        );
        const comparedData = xAxisData.map(p =>
            (electionToCompare.election_results.find(r => r.party.acronym === p)?.[0]?.percentage_votes) || 0
        );
        // 3. Update state
        return [
            { data: currentData, label: `(${election.year})`, id: 'current' },
            { data: comparedData, label: `(${yearToCompare})`, id: 'compare' },
        ];
    }, [election, electionToCompare, xAxisData, yearToCompare]);

    return (
        <BarChart
            height={400}
            xAxis={[{ data: xAxisData, label: 'Partidos' }]}
            yAxis={[{ label: 'Votos (%)' }]}
            series={series}
        />
    );
};

export default PlotElection;