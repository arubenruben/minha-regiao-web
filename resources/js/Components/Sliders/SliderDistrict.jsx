import React, { useEffect, useMemo } from 'react'
import { Slider } from '@mui/material';

const SliderLocal = ({ electionYears, selectedElectionYear, setSelectedElectionYear }) => {
    const { minYear, maxYear, marks } = useMemo(() => {
        if (!electionYears?.length) return { minYear: 0, maxYear: 0, marks: [] };

        return {
            minYear: Math.min(...electionYears),
            maxYear: Math.max(...electionYears),
            marks: electionYears.map(year => ({ value: year, label: year }))
        };
    }, [electionYears]);

    useEffect(() => {
        if (electionYears?.length && !selectedElectionYear) {
            setSelectedElectionYear(maxYear);
        }
    }, [electionYears, selectedElectionYear, maxYear, setSelectedElectionYear]);

    const handleChange = (_, value) => {
        if (value) {
            setSelectedElectionYear(value);
        }
    };

    // Don't render the slider if we don't have the necessary data
    if (!electionYears?.length || !selectedElectionYear) {
        return null;
    }

    return (
        <Slider
            value={selectedElectionYear}
            step={null}
            marks={marks}
            min={minYear}
            max={maxYear}
            valueLabelDisplay="auto"
            onChange={handleChange}
        />
    );
};

export default SliderLocal;