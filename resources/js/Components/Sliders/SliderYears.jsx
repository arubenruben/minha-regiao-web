import React, { useMemo } from 'react'
import { Slider } from '@mui/material';

const SliderYears = ({ elections, setSelectedElectionYear }) => {

    const { minYear, maxYear, marks } = useMemo(() => {
        if (!elections?.length)
            return { minYear: 0, maxYear: 0, marks: [] };

        const electionYears = elections.map(election => election.year).filter(year => year !== null);

        if (electionYears.length === 0)
            return { minYear: 0, maxYear: 0, marks: [] };

        return {
            minYear: Math.min(...electionYears),
            maxYear: Math.max(...electionYears),
            marks: electionYears.map(year => ({ value: year, label: year }))
        };

    }, [elections]);

    const handleChange = (_, value) => {
        if (value) {
            setSelectedElectionYear(value);
        }
    };

    return (
        <Slider
            defaultValue={maxYear}
            step={null}
            marks={marks}
            min={minYear}
            max={maxYear}
            valueLabelDisplay="auto"
            onChange={handleChange}
        />
    );
};

export default SliderYears;