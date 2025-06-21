import React, { useMemo, useEffect } from 'react'
import { Slider } from '@mui/material';
import { styled } from '@mui/material/styles';

const StyledSlider = styled(Slider)({
    '& .MuiSlider-markLabel': {
        transform: 'rotate(-45deg)',
        transformOrigin: 'left bottom',
        marginTop: '8px',
    },
});

const SliderHomepage = ({ elections, setSelectedYear }) => {
    
    const { minYear, maxYear, marks, latestYear } = useMemo(() => {    
        // The election years are the keys of the object elections
        const electionYears = Object.keys(elections).map(year => parseInt(year)).filter(year => !isNaN(year));
                
        if (electionYears.length === 0)
            return { minYear: 0, maxYear: 0, marks: [], latestYear: 0 };
        
        return {
            minYear: Math.min(...electionYears),
            maxYear: Math.max(...electionYears),
            marks: electionYears.map(year => ({ value: year, label: year })),
            latestYear: Math.max(...electionYears)
        };


    }, [elections]);

    useEffect(() => {
        if (latestYear > 0) {
            setSelectedYear(latestYear);
        }
    }, [latestYear, setSelectedYear]);

    const handleChange = (_, value) => {
        if (value) {
            setSelectedYear(value);
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

export default SliderHomepage;