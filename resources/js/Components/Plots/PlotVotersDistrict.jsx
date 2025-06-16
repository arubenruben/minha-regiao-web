import React, { useState, useEffect } from 'react'
import { LineChart } from '@mui/x-charts/LineChart';

const PlotVotersDistrict = (props) => {
    const [voters, setVoters] = useState([]);

    const constructVoters = (cities, electionYears) => {
        const votersAccumulator = electionYears.map(year => {
            const totalVoters = cities.reduce((total, city) => {
                const election = city.elections.find(election => election.year === year);
                if (election) {
                    return total + election.number_registered_voters;
                }
                return total;
            }, 0);

            return { year, voters: totalVoters };
        });

        setVoters(votersAccumulator.sort((a, b) => a.year - b.year));
    }

    useEffect(() => {
        if (props.cities && props.electionYears) {
            constructVoters(props.cities, props.electionYears);
        }
    }, [props.cities, props.electionYears]);

    const xAxis = voters.map((voter) => voter.year);
    const yAxis = voters.map((voter) => voter.voters);

    return (
        <LineChart
            xAxis={[{
                data: xAxis,
                label: 'Eleições Autárquicas',
                scaleType: 'point', // Ensure X-axis is numeric
            }]}
            yAxis={[{ label: 'Eleitores', scaleType: 'linear' }]} // Use the yAxis data from the voters state
            series={[
                {
                    data: yAxis,
                },
            ]}
            height={300}
        />
    )
}

export default PlotVotersDistrict