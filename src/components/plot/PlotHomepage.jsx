import React, { useState, useEffect } from 'react'
import { BarChart } from '@mui/x-charts/BarChart';

const PlotHomepage = (props) => {
    const [xAxis, setXAxis] = useState([]);
    const [series, setSeries] = useState([]);


    useEffect(() => {

        // Group items with number_cities == 1 into a single item the party "Outros"
        const groupedData = props.electionSummary.reduce((acc, item) => {
            if (item.number_cities === 1) {
                acc["Outros"] = (acc["Outros"] || 0) + item.number_cities;
            } else {
                acc[item.party] = (acc[item.party] || 0) + item.number_cities;
            }
            return acc;
        }, {});

        // If string party name contains "PSD", group it into "PPD/PSD"
        const updatedGroupedData = Object.keys(groupedData).reduce((acc, key) => {
            if (key.includes("PSD")) {
                acc["PPD/PSD"] = (acc["PPD/PSD"] || 0) + groupedData[key];
            } else {
                acc[key] = groupedData[key];
            }
            return acc;
        }, {});

        setXAxis(Object.keys(updatedGroupedData));
        setSeries([
            {
                name: 'Número de Cidades',
                data: Object.values(updatedGroupedData),
            },
        ]);

    }, [props.electionSummary])

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
