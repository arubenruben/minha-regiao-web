import React, { useMemo } from 'react'
import { BarChart } from '@mui/x-charts/BarChart';

const PlotHomepage = ({ elections, selectedYear }) => {
    // Memoize the processed elections data to avoid recalculating on every render
    const processedElections = useMemo(() => {
        if (!elections) return {};

        const processed = JSON.parse(JSON.stringify(elections)); // Deep clone to avoid mutating original

        for (const year in processed) {
            // Aggregate keys based on party names
            for (const key in processed[year]) {
                if (key.includes('PS') && key.includes('.') && key !== 'PS') {
                    processed[year]['PS'] = (processed[year]['PS'] || 0) + processed[year][key];
                    delete processed[year][key];
                } else if (key.includes('PPD/PSD') && key.includes('.') && key !== 'PPD/PSD') {
                    processed[year]['PPD/PSD'] = (processed[year]['PPD/PSD'] || 0) + processed[year][key];
                    delete processed[year][key];
                } else if (key.includes('PCP') && key.includes('.') && key !== 'PCP') {
                    processed[year]['PCP'] = (processed[year]['PCP'] || 0) + processed[year][key];
                    delete processed[year][key];
                }
            }

            // Group all keys with 1 value into 'Outros'
            const otherKeys = Object.keys(processed[year]).filter(key => processed[year][key] === 1);
            if (otherKeys.length > 0) {
                processed[year]['Outros'] = otherKeys.length;
                otherKeys.forEach(key => delete processed[year][key]);
            }
        }

        return processed;
    }, [elections]);

    // Memoize chart data to avoid recalculating when processedElections or selectedYear don't change
    const chartData = useMemo(() => {
        if (!processedElections || !selectedYear || !processedElections[selectedYear]) {
            return { xAxis: [], series: [] };
        }

        return {
            xAxis: Object.keys(processedElections[selectedYear]),
            series: Object.values(processedElections[selectedYear])
        };
    }, [processedElections, selectedYear]);

    return (
        <BarChart
            xAxis={[{
                data: chartData.xAxis,
                name: 'Partido',
            }]}
            series={[
                {
                    name: 'Número de Cidades',
                    data: chartData.series
                }
            ]}
            height={300}
        />
    )
}

export default PlotHomepage
