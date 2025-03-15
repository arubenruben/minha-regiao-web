import React from 'react'
import Plot from 'react-plotly.js';

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

        console.log("Building Y Axis", xAxis, elections);


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

        //TODO: Duplicate all results but for year 2022
        const lastYear = xAxis[xAxis.length - 1];
        const nextYear = 2025;

        results.forEach(element => {
            const yAxis = [...element.y];
            if (element.name === 'PCP-PEV') {
                yAxis.push(0.0);
            }
            else{
                yAxis.push(0.0);
            }
            results.push({
                ...element,
                'y': yAxis,
                'x': [...element.x, nextYear]
            });
        });

        return results;
    }

    const yAxis = buildYAxis(xAxis, props.elections);

    console.log(yAxis);


    return (
        <Plot
            data={yAxis}
            layout={{
                title: {
                    text: 'Histórico de Eleições Autárquicas',
                },
                xaxis: {
                    range: [1975, currentYear + 5 ],
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
