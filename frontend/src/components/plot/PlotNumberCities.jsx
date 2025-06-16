import React, { useState, useEffect } from 'react';
import { BarChart } from '@mui/x-charts/BarChart';
import { _constructElections } from '../../utils';

const PlotNumberCities = (props) => {

    const [parties, setParties] = useState({});
    const [elections, setElections] = useState([]);

    useEffect(() => {
        if (props.cities && props.selectedElectionYear) {
            // Filter the elections based on the selected election year
            const filteredElections = props.cities.map((city) => {
                return city.elections.filter((election) => election.year === props.selectedElectionYear);
            }).flat();

            // Process elections data using map and reduce instead of for loops
            const newElections = filteredElections.map((election, i) => _constructElections(props.cities[i], election));

            // Sort newElections by city name
            setElections(newElections.sort((a, b) => a.city.name.localeCompare(b.city.name)));
        }
    }, [props.cities, props.selectedElectionYear]);

    useEffect(() => {
        const partyCount = elections.reduce((acc, election) => {
            const party = election.winner?.party;
            if (!party) return acc; // Skip if no party is found
            acc[party] = (acc[party] || 0) + 1;
            return acc;
        }, {});

        setParties(partyCount);
    }, [elections]);

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
            yAxis={[{ width: 50, label: props.yAxisLabel }]}
        />
    );
}

export default PlotNumberCities
