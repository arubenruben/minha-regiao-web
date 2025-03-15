import MenuItem from '@mui/material/MenuItem';
import React, { useState, useEffect } from 'react';
import FormControl from '@mui/material/FormControl';
import { InputLabel, Select } from '@mui/material';
import { sendRequest } from '../../utils';


const SelectMunicipality = () => {
    const [districts, setDistricts] = useState([]);
    const [cities, setCities] = useState([]);
    const [selectedDistrict, setSelectedDistrict] = useState('');
    const [selectedCity, setSelectedCity] = useState('');
    const [selectedMunicipality, setSelectedMunicipality] = useState('');
    const [municipalities, setMunicipalities] = useState([]);


    const fetchDistricts = async () => {
        const districts = await sendRequest(
            `${process.env.REACT_APP_ENDPOINT}/districts/`,
            'GET'
        );
        setDistricts(districts);
    }

    const fetchCities = async (district) => {
        const cities = await sendRequest(
            `${process.env.REACT_APP_ENDPOINT}/cities/?district=${district}`,
            'GET'
        );
        setCities(cities);
    }

    const fetchMunicipalities = async (city) => {
        const municipalities = await sendRequest(
            `${process.env.REACT_APP_ENDPOINT}/municipalities/?city=${city}`,
            'GET'
        );
        setMunicipalities(municipalities);
    }

    useEffect(() => {
        fetchDistricts();
    }, []);

    const handleDistrictChange = async (e) => {
        setSelectedDistrict(e.target.value);
        fetchCities(e.target.value);
    }

    const handleCityChange = async (e) => {
        setSelectedCity(e.target.value);
        fetchMunicipalities(e.target.value);
    }

    const handleMunicipalityChange = async (e) => {
        setSelectedMunicipality(e.target.value);
    }


    return (
        <>
            <FormControl fullWidth>
                <InputLabel>Distrito</InputLabel>
                <Select
                    value={selectedDistrict}
                    label="Distrito"
                    onChange={(e) => handleDistrictChange(e)}
                >
                    {districts.map((district, index) => (
                        <MenuItem key={index} value={district.name}>
                            {district.name}
                        </MenuItem>
                    ))}
                </Select>
            </FormControl>
            {selectedDistrict && <FormControl fullWidth sx={{ mt: 5 }}>
                <InputLabel>Cidade</InputLabel>
                <Select
                    value={selectedCity}
                    label="Cidade"
                    onChange={(e) => handleCityChange(e)}
                >
                    {cities.map((city, index) => (
                        <MenuItem key={index} value={city.name}>
                            {city.name}
                        </MenuItem>
                    ))}
                </Select>
            </FormControl>}
            {selectedCity && <FormControl fullWidth sx={{ mt: 5 }}>
                <InputLabel>Freguesia</InputLabel>
                <Select
                    value={selectedMunicipality}
                    label="Freguesia"
                    onChange={(e) => handleMunicipalityChange(e)}
                >
                    {municipalities.map((municipality, index) => (
                        <MenuItem key={index} value={municipality.name}>
                            {municipality.name}
                        </MenuItem>
                    ))}
                </Select>
            </FormControl >}
        </>
    );
};

export default SelectMunicipality;