import React, { useMemo } from 'react'
import { LineChart } from '@mui/x-charts/LineChart';

const PlotVoters = ({ locations }) => {

    const { xAxis, series, yAxisLabel, hasLargeValues } = useMemo(() => {
        if (!locations || locations.length === 0) {
            return { xAxis: [], series: [], yAxisLabel: 'Eleitores', hasLargeValues: false };
        }

        // Extract and sort unique years
        const yearsSet = new Set();

        locations.forEach(city => {
            city.elections?.forEach(election => {
                yearsSet.add(election.year);
            });
        });

        const sortedYears = Array.from(yearsSet).sort((a, b) => a - b);

        // Calculate voters data
        const votersData = sortedYears.map(year => {
            return locations.reduce((total, city) => {
                const election = city.elections?.find(election => election.year === year);
                return total + (election?.number_registered_voters || 0);
            }, 0);
        });

        // Check if any value is above 10k and format accordingly
        const hasLargeValues = votersData.some(value => value > 10000);
        const formattedData = hasLargeValues ? votersData.map(value => value / 1000) : votersData;
        const label = hasLargeValues ? 'Milhares de Eleitores' : 'Eleitores';

        return { xAxis: sortedYears, series: formattedData, yAxisLabel: label, hasLargeValues };

    }, [locations]);

    return (
        <LineChart
            xAxis={[{
                data: xAxis,
                label: 'Eleições Autárquicas',
                scaleType: 'point',
            }]}
            yAxis={[{ 
                label: yAxisLabel, 
                scaleType: 'linear',
                valueFormatter: hasLargeValues ? (value) => `${value}K` : undefined
            }]}
            series={[{
                data: series,
            }]}
            height={300}
        />
    )
}

export default PlotVoters
