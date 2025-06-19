import React from 'react'
import { LineChart } from '@mui/x-charts/LineChart';

const PlotAbstentionLocal = ({ elections }) => {
    return (
        <LineChart
            xAxis={[{ data: elections.map(elem => elem.year), scaleType: 'point', label: 'Eleições Autárquicas' }]}
            yAxis={[{ type: 'linear', label: 'Taxa de Abstenção (%)' }]}
            series={[
                {
                    data: elections.map((elem => (elem.number_absentee_votes / elem.number_registered_voters * 100).toFixed(2))),
                },
            ]}
            height={300}
        />
    )
}

export default PlotAbstentionLocal
