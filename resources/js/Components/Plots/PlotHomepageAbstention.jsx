import React, { useEffect, useState } from 'react'
import { LineChart } from '@mui/x-charts/LineChart';

const PlotHomepageAbstention = (props) => {
    const [xAxis, setXAxis] = useState([]);
    const [series, setSeries] = useState([]);


    useEffect(() => {
        // Set the xAxis and yAxis data based on the abstention data
        // Sort the abstention data by year in descending order
        props.abstention.sort((a, b) => a.year - b.year);

        const xAxisData = props.abstention.map((elem, index) => elem.year);
        const seriesData = props.abstention.map((elem, index) => elem.abstention_rate);

        setXAxis(xAxisData);
        setSeries(seriesData);

    }, [props.abstention]);

    return (
        <LineChart
            xAxis={[{
                data: xAxis,
                label: 'Eleições Autárquicas',
                scaleType: 'point', // Ensure X-axis is numeric
            }]}
            yAxis={[{ label: 'Abstenção (%)', scaleType: 'linear' }]} // Use the yAxis data from the voters state
            series={[
                {
                    data: series,
                },
            ]}
            height={380}
        />
    )
}

export default PlotHomepageAbstention