import MenuItem from '@mui/material/MenuItem';
import React, { useState, useEffect } from 'react';
import FormControl from '@mui/material/FormControl';
import { Select } from '@mui/material';
import { sendRequest } from '../../utils';


const SelectMunicipality = () => {
    const [districts, setDistricts] = useState([]);
    const [selectedDistrict, setSelectedDistrict] = useState('');
    const [selectedConstituency, setSelectedConstituency] = useState('');

    // TODO: Load districts when component mounts
    useEffect(() => {
        const fetchDistricts = async () => {
            
            console.log(process.env.REACT_APP_ENDPOINT);
            
            const districts = await sendRequest(
                `${process.env.REACT_APP_ENDPOINT}/districts`,
                'GET',
            );
            
            console.log("Aqui");
            
            console.log(districts);

            setDistricts(districts);
        };
        
        fetchDistricts();
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