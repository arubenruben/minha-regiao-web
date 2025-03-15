import MenuItem from '@mui/material/MenuItem';
import React, { useState, useEffect } from 'react';
import FormControl from '@mui/material/FormControl';
import { Select } from '@mui/material';

const SelectMunicipality = (props) => {
    const [districts, setDistricts] = useState([]);
    const [selectedDistrict, setSelectedDistrict] = useState('');
    const [selectedConstituency, setSelectedConstituency] = useState('');

    // TODO: Load districts when component mounts
    useEffect(() => {
        const districts = sendRequest(
            `${process.env.ENDPOINT}/districts`,
            'GET',
        );

        console.log(districts);

        setDistricts([])
    }, []);

    return (
        <FormControl>
            <Select
                value={selectedDistrict}
                label="Distrito"
                onChange={(e) => setSelectedDistrict(e.target.value)}
            >
                {districts.map((district, index) => (
                    <MenuItem key={index} value={district}>
                        {district}
                    </MenuItem>
                ))}
            </Select>
            <Select
                value={selectedConstituency}
                label="Constituency"
                onChange={(e) => setSelectedConstituency(e.target.value)}
            >
                {/* Render constituencies when available */}
            </Select>
        </FormControl>
    );
};

export default SelectMunicipality;