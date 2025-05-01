import React from 'react'
import { LineChart } from '@mui/x-charts/LineChart';

const PlotVoters = (props) => {
    const xAxis = props.voters.map((voter) => voter.year);
    const yAxis = props.voters.map((voter) => voter.voters);

    console.log(xAxis);
    console.log(yAxis);


    return (
        <LineChart         
            xAxis={[{
                data: xAxis,
                label: 'Anos Eleitorais',
                scaleType: 'point', // Ensure X-axis is numeric
                //labelFormat: (value) => value.toString().replace(',', ''), // Remove commas
            }]}
            yAxis={[{ label: 'Eleitores', scaleType: 'log' }]} // Use the yAxis data from the voters state
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
