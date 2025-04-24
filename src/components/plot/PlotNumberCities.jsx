import React from 'react'
import Plot from 'react-plotly.js';

const PlotNumberCities = (props) => {
    return (
        <Plot
            data={[
                {
                    x: [1, 2, 3],
                    y: [2, 6, 3],
                    type: 'scatter',
                    mode: 'lines+markers',
                    marker: { color: 'red' },
                },
                { type: 'bar', x: [1, 2, 3], y: [2, 5, 3] },
            ]}
            layout={{ title: { text: `Número de Câmaras Municipais em ${props.name} - ${props.selectedElectionYear}` } }}
        />
    )
}

export default PlotNumberCities
