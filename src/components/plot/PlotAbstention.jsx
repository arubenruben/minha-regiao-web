import React, { useState, useEffect } from 'react'
import { LineChart } from '@mui/x-charts/LineChart';

const PlotAbstention = (props) => {
    const [absenteeVoters, setAbsenteeVoters] = useState([]);

    const constructAbsenteeVoters = (cities, electionYears) => {
        const votersAccumulator = electionYears.map(year => {
            let totalAbsenteeVotes = 0;
            let totalRegisteredVoters = 0;
            let citiesWithDataCount = 0;
            
            cities.forEach(city => {
                const election = city.elections.find(election => election.year === year);
                if (election) {
                    totalAbsenteeVotes += election.number_absentee_votes;
                    totalRegisteredVoters += election.number_registered_voters;
                    citiesWithDataCount++;
                }
            });
            
            // Calculate the average abstention rate only if we have data
            const voters = citiesWithDataCount > 0 ? ((totalAbsenteeVotes / totalRegisteredVoters) * 100).toFixed(2) : 0;
                
            return { year, voters };
        });

        setAbsenteeVoters(votersAccumulator.sort((a, b) => a.year - b.year));
    }

    useEffect(() => {
        if (props.cities && props.electionYears) {
            constructAbsenteeVoters(props.cities, props.electionYears);
        }
    }, [props.cities, props.electionYears]);
    
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