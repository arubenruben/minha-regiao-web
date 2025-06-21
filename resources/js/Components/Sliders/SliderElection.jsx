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

const SliderElection = ({ elections, setSelectedElectionYear }) => {

    const { minYear, maxYear, marks } = useMemo(() => {
        if (!elections?.length)
            return { minYear: 0, maxYear: 0, marks: [] };

        const electionYears = elections.map(election => election.year).filter(year => year !== null);

        if (electionYears.length === 0)
            return { minYear: 0, maxYear: 0, marks: [] };

        return {
            minYear: Math.min(...electionYears),
            maxYear: Math.max(...electionYears) + 4,
            marks: [
                ...electionYears.map(year => ({ value: year, label: year })),
                { value: Math.max(...electionYears) + 4, label: new Date().getFullYear() }
            ]
        };

    }, [elections]);

    const handleChange = (_, value) => {
        const currentYear = new Date().getFullYear();
        if (value === currentYear) {
            setSelectedElectionYear(null);
        } else {
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

export default SliderElection;