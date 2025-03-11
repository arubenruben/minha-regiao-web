import MenuItem from '@mui/material/MenuItem';
import React, { useState, useEffect } from 'react';
import FormControl from '@mui/material/FormControl';
import { InputLabel, Select } from '@mui/material';

const SelectMunicipality = (props) => {
    const [districts, setDistricts] = useState([]);
    const [selectedDistrict, setSelectedDistrict] = useState('');
    const [selectedConstituency, setSelectedConstituency] = useState('');
    const [selectedMunicipality, setSelectedMunicipality] = useState('');

    // TODO: Load districts when component mounts
    useEffect(() => {
        setDistricts(['Porto', 'Lisboa', 'Faro']);
    }, []);

    return (
        <form>
            <h1>Selecionar uma Localidade</h1>
            <FormControl fullWidth sx={{ mb: 5 }}>
                <InputLabel>Distrito</InputLabel>
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
            </FormControl>
            <FormControl fullWidth sx={{ mb: 5 }} disabled={!selectedDistrict}>
                <InputLabel>Concelhos</InputLabel>
                <Select
                    value={selectedConstituency}
                    label="Constituency"
                    onChange={(e) => setSelectedConstituency(e.target.value)}
                >
                    {/* Render constituencies when available */}
                </Select>
            </FormControl>
            <FormControl fullWidth disabled={!selectedConstituency}>
                <InputLabel>Freguesias</InputLabel>
                <Select
                    value={selectedMunicipality}
                    label="Freguesias"
                    onChange={(e) => setSelectedMunicipality(e.target.value)}
                >
                    {/* Render Municipalityes when available */}
                </Select>
            </FormControl>
        </form>
    );
};

export default SelectMunicipality;
