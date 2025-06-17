import React, { useState, useEffect } from 'react'
import { BarChart } from '@mui/x-charts/BarChart';

const PlotHomepage = ({ elections, selectedYear }) => {

    const [xAxis, setXAxis] = useState([]);
    const [series, setSeries] = useState([]);

    useEffect(() => {

        // The XAxis is the elections[selectedYear] keys
        // The Series is the elections[selectedYear] values
        if (!elections || !selectedYear || !elections[selectedYear]) {
            setXAxis([]);
            setSeries([]);
            return;
        }

        setXAxis(Object.keys(elections[selectedYear]));
        setSeries([{
            name: 'Número de Cidades',
            data: Object.values(elections[selectedYear]),
        }]);


    }, [elections, selectedYear]);

    return (
        <BarChart
            xAxis={[{
                data: xAxis,
                name: 'Partido',
            }]}
            series={series}
            height={300}
        />
    )
}

export default PlotHomepage