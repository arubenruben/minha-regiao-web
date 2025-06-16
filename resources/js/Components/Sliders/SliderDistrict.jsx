import React, { useEffect } from 'react'
import { Slider } from '@mui/material';


const SliderDistrict = ({ electionYears, setSelectedElectionYear }) => {
    useEffect(() => {
        if (electionYears?.length) {
            const mostRecentYear = Math.max(...electionYears);
            setSelectedElectionYear(mostRecentYear);
        }
    }, [electionYears]);

    return (
        <Slider
            defaultValue={electionYears[0]}
            step={null}
            marks={electionYears.map(year => ({ value: year, label: year }))}
            min={Math.min(...electionYears)}
            max={Math.max(...electionYears)}
            valueLabelDisplay="auto"
            onChange={(_, value) => {
                if (value) {
                    setSelectedElectionYear(value);
                }
            }}
        />
    )
}

export default SliderDistrict