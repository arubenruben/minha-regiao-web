import React from 'react'
import { Slider } from '@mui/material';


const SliderDistrict = (props) => {
    return (
        <Slider
            defaultValue={props.electionYears[0]}
            step={null}
            marks={props.electionYears.map(year => ({ value: year, label: year }))}
            min={Math.min(...props.electionYears)}
            max={Math.max(...props.electionYears)}
            valueLabelDisplay="auto"
            onChange={(_, value) => {
                if (value) {
                    props.setSelectedElectionYear(value);
                }
            }}
        />
    )
}

export default SliderDistrict
