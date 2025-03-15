import MenuItem from '@mui/material/MenuItem';
import React, { useState, useEffect } from 'react';
import FormControl from '@mui/material/FormControl';
import { InputLabel, Select } from '@mui/material';
import { sendRequest } from '../../utils';


const SelectMunicipality = () => {
    const [districts, setDistricts] = useState([]);
    const [selectedDistrict, setSelectedDistrict] = useState('Selecionar um distrito');
    const [selectedConstituency, setSelectedConstituency] = useState(null);

    // TODO: Load districts when component mounts
    useEffect(() => {
        const fetchDistricts = async () => {
            const districts = await sendRequest(
                `${process.env.REACT_APP_ENDPOINT}/districts/`,
                'GET'
            );
            setDistricts(districts);
        };

        fetchDistricts();
    }, []);

    const handleDistrictChange = async (e) => {
        setSelectedDistrict(e.target.value);
    }

    return (
        <FormControl fullWidth>
            <InputLabel>Distrito</InputLabel>
            <Select
                value={selectedDistrict}
                label="Distrito"
                onChange={(e) => setSelectedDistrict(e.target.value)}
            >
                {districts.map((district, index) => (
                    <MenuItem key={index} value={district.id}>
                        {district.name}
                    </MenuItem>
                ))}
            </Select>
            {selectedConstituency && <Select
                value={selectedConstituency}
                label="Constituency"
                onChange={(e) => setSelectedConstituency(e.target.value)}
            >
                {/* Render constituencies when available */}
            </Select>}
        </FormControl>
    );
};

export default SelectMunicipality;