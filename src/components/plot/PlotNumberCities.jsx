import React, { useState, useEffect } from 'react';
import { BarChart } from '@mui/x-charts/BarChart';

const PlotNumberCities = (props) => {

    const [parties, setParties] = useState({});

    useEffect(() => {
        const partyCount = props.elections.reduce((acc, election) => {
            const party = election.winner.party;
            acc[party] = (acc[party] || 0) + 1;
            return acc;
        }, {});

        setParties(partyCount);
    }, [props.elections]);

    // X labels are the keys of the parties object
    const xLabels = Object.keys(parties).map((party) => {
        return party;
    });

    // Y labels are the values of the parties object
    const yLabels = Object.values(parties).map((counter) => {
        return counter;
    });

    return (
        <BarChart
            height={300}
            series={[
                { data: yLabels },
            ]}
            xAxis={[{ data: xLabels, label: 'Partidos' }]}
            yAxis={[{ width: 50, label: 'Número de Câmaras Municipais' }]}
        />
    );
}

export default PlotNumberCities
