import React from 'react'
import { LineChart } from '@mui/x-charts/LineChart';

const PlotAbstentionCity = (props) => {
    return (
        <>
            {props.elections && <LineChart
                xAxis={[{ data: props.elections.map(elem => elem.year), scaleType: 'point', label: 'Eleições Autárquicas' }]}
                yAxis={[{ type: 'linear', label: 'Taxa de Abstenção (%)' }]}
                series={[
                    {
                        data: props.elections.map((elem => (elem.number_absentee_votes / elem.number_registered_voters * 100).toFixed(2))),
                    },
                ]}
                height={300}
            />}
        </>
    )
}

export default PlotAbstentionCity

