import React, { useMemo } from 'react';
import { BarChart } from '@mui/x-charts/BarChart';

const PlotNumberCities = ({ yAxisLabel, locations, selectedElectionYear }) => {
    const { xAxisData, yAxisData } = useMemo(() => {
        if (!locations) {
            return { xAxisData: [], yAxisData: [] };
        }

        const partyCount = {};

        for (const location in locations) {
            const election = locations[location].elections.find(election => election.year === selectedElectionYear);
            if (election?.winner?.party) {
                const acronym = election.winner.party.acronym;
                partyCount[acronym] = (partyCount[acronym] || 0) + 1;
            }
        }

        return {
            xAxisData: Object.keys(partyCount),
            yAxisData: Object.values(partyCount)
        };
    }, [locations, selectedElectionYear]);

    return (
        <BarChart
            height={300}
            series={[{ data: yAxisData }]}
            xAxis={[{ data: xAxisData, label: 'Partidos' }]}
            yAxis={[{ width: 50, label: yAxisLabel }]}
        />
    );
};

export default PlotNumberCities;
