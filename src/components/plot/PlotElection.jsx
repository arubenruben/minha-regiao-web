import React from 'react'
import Plot from 'react-plotly.js';


//TODO: Add Abstention
//TODO: Add Blank Votes
//TODO: Add Null Votes

const PlotElection = (props) => {
    const xAxis = props.elections?.map(e => e.year) || [];

    const currentYear = new Date().getFullYear();

    xAxis.sort((a, b) => a - b);

    const PARTYMETADATA = {
        'PS': {
            'name': 'PS',
            'mode': 'lines',
            'line': {
                'dash': 'solid',
                'width': 4,
                'shape': 'spline',
                'color': '#ff0000'
            },
        },
        'PPD/PSD.CDS-PP': {
            'name': 'PSD',
            'mode': 'lines',
            'line': {
                'dash': 'solid',
                'width': 4,
                'shape': 'spline',
                'color': '#003399'
            },
        },
        'PCP-PEV': {
            'name': 'PCP-PEV',
            'mode': 'lines',
            'line': {
                'dash': 'dot',
                'width': 4,
                'shape': 'spline',
                'color': '#ffcc00'
            },
        },
        'B.E.': {
            'name': 'BE',
            'mode': 'lines',
            'line': {
                'dash': 'dashdot',
                'width': 4,
                'shape': 'spline',
                'color': '#6600cc'
            },
        },

    }


    const buildYAxis = (xAxis, elections) => {
        const results = []

        if (!elections) {
            return results;
        }

        if (!xAxis) {
            return results;
        }

        ['PS', 'PPD/PSD.CDS-PP', 'PCP-PEV', 'B.E.'].forEach(element => {
            const yAxis = [];

            for (let i = 0; i < xAxis.length; i++) {
                const election = elections.find(e => e.year === xAxis[i]);

                if (election) {

                    const party = election.results.find(r => r.party === element);

                    if (party) {
                        yAxis.push(party.votes / election.number_votes * 100);
                    } else {
                        yAxis.push(0);
                    }
                }
            }

            results.push({
                ...PARTYMETADATA[element],
                'y': yAxis,
                'x': xAxis,
            });
        });

        //TODO: Remove This Debug Code: Duplicate all results but for year 2022
        const nextYear = 2025;

        for (let i = 0; i < results.length; i++) {
            const element = results[i];
            const yAxis = [...element.y];

            yAxis.push(0);

            results[i] = {
                ...element,
                'y': yAxis,
                'x': [...element.x, nextYear]
            };
        }

        return results;
    }

    const yAxis = buildYAxis(xAxis, props.elections);

    return (
        <Plot
            data={yAxis}
            layout={{
                title: {
                    text: 'Resultados Autárquicos',
                },
                xaxis: {
                    range: [1975, currentYear + 5],
                    autorange: false
                },
                yaxis: {
                    range: [0, 100.0],
                    autorange: false
                },
                legend: {
                    y: 1.0,
                    traceorder: 'reversed',
                    font: {
                        size: 16
                    }
                }
            }}
        />
    )
}

export default PlotElection
