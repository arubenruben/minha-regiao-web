import React, { useEffect, useState } from 'react'
import { LineChart } from '@mui/x-charts/LineChart';

const PlotHomepageAbstention = ({ abstencion }) => {
    const [xAxis, setXAxis] = useState([]);
    const [series, setSeries] = useState([]);

    useEffect(() => {
        // The xAxis are the keys of the abstencion object
        // The series are the values of the abstencion object
        if (!abstencion || abstencion.length === 0) {
            setXAxis([]);
            setSeries([]);
            return;
        }

        setXAxis(Object.keys(abstencion))
        setSeries(Object.values(abstencion));
    }, []);

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