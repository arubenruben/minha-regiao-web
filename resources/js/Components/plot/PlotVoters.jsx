import React, { useState, useEffect } from 'react'
import { LineChart } from '@mui/x-charts/LineChart';
import { _constructElections } from '../../utils';

const PlotVoters = (props) => {
    const [xAxis, setXAxis] = useState([]);
    const [yAxis, setYAxis] = useState([]);

    useEffect(() => {
        if (props.elections) {
            // Sort elections by year
            const sortedElections = props.elections.sort((a, b) => a.year - b.year);

            setXAxis(sortedElections.map((locality) => locality.year));
            setYAxis(sortedElections.map((locality) => locality.number_registered_voters));
        }
    }, [props.elections, props.electionYears]);

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

export default PlotVoters
