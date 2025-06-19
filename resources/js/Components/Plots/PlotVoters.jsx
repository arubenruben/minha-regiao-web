import React, { useMemo } from 'react'
import { LineChart } from '@mui/x-charts/LineChart';

const PlotVoters = ({ locations }) => {

    const { xAxis, series } = useMemo(() => {
        if (!locations || locations.length === 0) {
            return { xAxis: [], series: [] };
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

        return { xAxis: sortedYears, series: votersData };

    }, [locations]);

    return (
        <LineChart
            xAxis={[{
                data: xAxis,
                label: 'Eleições Autárquicas',
                scaleType: 'point',
            }]}
            yAxis={[{ label: 'Eleitores', scaleType: 'linear' }]}
            series={[{
                data: series,
            }]}
            height={300}
        />
    )
}

export default PlotVoters
