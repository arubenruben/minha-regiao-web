import React from 'react'
import { BarChart } from '@mui/x-charts/BarChart';

const PlotHomepage = (props) => {
    return (
        <BarChart
            xAxis={[{ data: props.electionSummary.map((item) => item.party) }]}
            series={[{ data: props.electionSummary.map((item) => item.number_cities) },]}
            height={300}
        />
    )
}

export default PlotHomepage
