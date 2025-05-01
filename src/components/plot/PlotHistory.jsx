import React, { useState, useEffect } from 'react'
import { LineChart } from '@mui/x-charts/LineChart';


const PlotHistory = (props) => {
    const [xAxis, setXAxis] = useState([]);
    const [series, setSeries] = useState([]);


    // yAxis is a list of 0 to 100; representing the percentage of votes for the president in each election. Spaced by 5%

    const yAxis = [
        0, 5, 10, 15, 20, 25, 30, 35, 40, 45,
        50, 55, 60, 65, 70, 75, 80, 85, 90,
        95, 100
    ];

    // Each party will have a its series with the percentage of votes in each election year

    useEffect(() => {
        if (!props.elections) return;
        
        // Sort elections by year
        props.elections.sort((a, b) => a.year - b.year);

        setXAxis(props.elections.map((election) => election.year));
        setSeries([])

        const newSeries = [];

        let parties = new Set();

        for (let i = 0; i < props.elections.length; i++) {
            const election = props.elections[i];
            for (let j = 0; j < election.election_results.length; j++) {
                const result = election.election_results[j];
                parties.add(result.party);
            }
        }

        parties = Array.from(parties);

        for (let j = 0; j < parties.length; j++) {
            const party = parties[j];
            const acumulator = [];

            for (let i = 0; i < props.elections.length; i++) {


                const result = props.elections[i].election_results.find((result) => result.party === party);

                // if the party is not in the election, continue
                if (!result) {
                    acumulator[i] = null;
                    continue;
                }

                // if the party is in the election, set the percentage of votes
                acumulator[i] = result.number_votes;
            }

            newSeries.push({
                data: acumulator,
                label: party,
                connectNulls: true,
            })

        }

        setSeries(newSeries);


    }, [props.elections])

    console.log(series);

    return (
        <LineChart
            xAxis={[{ data: xAxis, label: 'Anos Eleitorais', scaleType: 'point' }]} // Ensure X-axis is numeric
            yAxis={[{ data: yAxis, label: 'Percentagem de Votos', scaleType: 'linear' }]} // Use the yAxis data from the voters state
            series={series}
            height={300}
        />
    )
}

export default PlotHistory
