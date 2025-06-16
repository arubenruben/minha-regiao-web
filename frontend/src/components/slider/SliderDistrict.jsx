import React, { useEffect } from 'react'
import { Slider } from '@mui/material';


const SliderDistrict = (props) => {
    useEffect(() => {
        if (props.electionYears?.length) {
            const mostRecentYear = Math.max(...props.electionYears);
            props.setSelectedElectionYear(mostRecentYear);
        }
    }, [props.electionYears]);

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
