import React from 'react'
import { Slider } from '@mui/material';


const SliderHomepage = ({ selectedYear, electionYears, setSelectedYear }) => {
    return (
        <Slider
            defaultValue={selectedYear}
            step={null}
            marks={electionYears.map(year => ({ value: year, label: year }))}
            min={Math.min(...electionYears)}
            max={Math.max(...electionYears)}
            valueLabelDisplay="auto"
            onChange={(_, value) => {
                if (value) {
                    setSelectedYear(value);
                }
            }}
        />
    )
}

export default SliderHomepage