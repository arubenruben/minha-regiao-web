import React from 'react'
import { Slider } from '@mui/material';

const SliderElection = (props) => {
    return (
        <Slider
            defaultValue={Math.max(...props.electionYears) + 4}
            step={null}
            marks={[
                { value: Math.max(...props.electionYears) + 4, label: "Não Comparar" },
                ...props.electionYears.map(year => ({ value: year, label: year }))
            ]}
            min={Math.min(...props.electionYears)}
            max={Math.max(...props.electionYears) + 4}
            valueLabelDisplay="auto"
            onChange={(_, value) => {
                if (value) {
                    if (value === Math.max(...props.electionYears) + 4) {
                        props.setYearToCompare(null);
                    }
                    else {
                        props.setYearToCompare(value);
                    }
                }
            }}
        />
    )
}

export default SliderElection