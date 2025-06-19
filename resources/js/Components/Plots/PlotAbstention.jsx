import React, { useMemo } from 'react'
import { LineChart } from '@mui/x-charts/LineChart';

const PlotAbstention = ({ locations }) => {
    const absenteeVoters = useMemo(() => {
        if (!locations) {
            return [];
        }

        // Calculate electionYears from locations using a Set
        const electionYears = [...new Set(
            locations.flatMap(city => 
                city.elections.map(election => election.year)
            )
        )].sort((a, b) => a - b);

        const votersAccumulator = electionYears.map(year => {
            let totalAbsenteeVotes = 0;
            let totalRegisteredVoters = 0;
            let locationsWithDataCount = 0;

            locations.forEach(city => {
                const election = city.elections.find(election => election.year === year);
                if (election) {
                    totalAbsenteeVotes += election.number_absentee_votes;
                    totalRegisteredVoters += election.number_registered_voters;
                    locationsWithDataCount++;
                }
            });

            // Calculate the average abstention rate only if we have data
            const voters = locationsWithDataCount > 0 ? ((totalAbsenteeVotes / totalRegisteredVoters) * 100).toFixed(2) : 0;

            return { year, voters };
        });

        return votersAccumulator.sort((a, b) => a.year - b.year);
    }, [locations]);

    return (
        <LineChart
            xAxis={[{ data: absenteeVoters.map(voter => voter.year), scaleType: 'point', label: 'Eleições Autárquicas' }]}
            yAxis={[{ type: 'linear', label: 'Taxa de Abstenção (%)' }]}
            series={[
                {
                    data: absenteeVoters.map(voter => voter.voters),
                },
            ]}
            height={300}
        />
    )
}

export default PlotAbstention
