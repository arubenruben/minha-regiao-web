import React, { useEffect, useState } from 'react'
import { LineChart } from '@mui/x-charts/LineChart';

const PlotHomepageAbstention = (props) => {
    
    return (
        <LineChart
            xAxis={[{
                data: props.abstention.map((elem, index) => elem.year),
                label: 'Eleições Autárquicas',
                scaleType: 'point', // Ensure X-axis is numeric
            }]}
            yAxis={[{ label: 'Abstenção (%)', scaleType: 'linear' }]} // Use the yAxis data from the voters state
            series={[
                {
                    data: props.abstention.map((elem, index) => elem.abstention_rate),
                },
            ]}
            height={300}
        />
    )
}

export default PlotHomepageAbstention
