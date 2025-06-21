import React, { useMemo } from 'react'
import { Slider } from '@mui/material';
import { styled } from '@mui/material/styles';

const StyledSlider = styled(Slider)({
    '& .MuiSlider-markLabel': {
        transform: 'rotate(-45deg)',
        transformOrigin: 'left bottom',
        marginTop: '8px',
    },
});

const SliderYears = ({ elections, setSelectedElectionYear }) => {

    const { minYear, maxYear, marks } = useMemo(() => {
        if (!elections?.length)
            return { minYear: 0, maxYear: 0, marks: [] };

        const electionYears = elections.map(election => election.year).filter(year => year !== null);

        console.log(electionYears);

        if (electionYears.length === 0)
            return { minYear: 0, maxYear: 0, marks: [] };

        setSelectedElectionYear(electionYears[0]);

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
        <StyledSlider
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