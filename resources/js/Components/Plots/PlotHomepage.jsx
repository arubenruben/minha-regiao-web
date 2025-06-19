import React, { useState, useEffect } from 'react'
import { BarChart } from '@mui/x-charts/BarChart';

const PlotHomepage = ({ elections, selectedYear }) => {
    console.log(elections);

    // Aggregate keys based on the following convertion map:
    // if 'PS' and a '.' in the key, convert to 'PS'
    // if 'PPD/PSD' and a '.' in the key, convert to 'PPD/PSD'
    for (const year in elections) {
        for (const key in elections[year]) {
            if (key.includes('PS') && key.includes('.') && key !== 'PS') {
                elections[year]['PS'] = (elections[year]['PS'] || 0
                ) + elections[year][key];
                delete elections[year][key];
            } else if (key.includes('PPD/PSD') && key.includes('.') && key !== 'PPD/PSD') {
                elections[year]['PPD/PSD'] = (elections[year]['PPD/PSD'] || 0
                ) + elections[year][key];
                delete elections[year][key];
            } else if (key.includes('PCP') && key.includes('.') && key !== 'PCP') {
                elections[year]['PCP'] = (elections[year]['PCP'] || 0
                ) + elections[year][key];
                delete elections[year][key];
            }
        }

        // Group all keys with 1 value into 'Outros'
        const otherKeys = Object.keys(elections[year]).filter(key => elections[year][key] === 1);

        if (otherKeys.length > 0) {
            elections[year]['Outros'] = otherKeys.reduce((sum, key) => sum + elections[year][key], 0);
            otherKeys.forEach(key => delete elections[year][key]);
        }
    }

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