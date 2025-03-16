import MenuItem from '@mui/material/MenuItem';
import React, { useState, useEffect, useCallback } from 'react';
import FormControl from '@mui/material/FormControl';
import { InputLabel, Select } from '@mui/material';
import { sendRequest } from '../../utils';
import Button from '@mui/material/Button';
import { Link } from "react-router";
import Grid from '@mui/material/Grid2';

const SelectMunicipality = () => {
    const [districts, setDistricts] = useState([]);
    const [cities, setCities] = useState([]);
    const [municipalities, setMunicipalities] = useState([]);
    const [selectedValues, setSelectedValues] = useState({
        district: '',
        city: '',
        municipality: ''
    });

    const fetchDistricts = useCallback(async () => {
        try {
            const districts = await sendRequest(
                `${process.env.REACT_APP_ENDPOINT}/districts/`,
                'GET'
            );
            setDistricts(districts || []);
        } catch (error) {
            console.error('Failed to fetch districts:', error);
            setDistricts([]);
        }
    }, []);

    const fetchCities = useCallback(async (district) => {
        if (!district) return;
        try {
            const cities = await sendRequest(
                `${process.env.REACT_APP_ENDPOINT}/cities/?district=${district}`,
                'GET'
            );
            setCities(cities || []);
        } catch (error) {
            console.error('Failed to fetch cities:', error);
            setCities([]);
        }
    }, []);

    const fetchMunicipalities = useCallback(async (city) => {
        if (!city) return;
        try {
            const municipalities = await sendRequest(
                `${process.env.REACT_APP_ENDPOINT}/municipalities/?city=${city}`,
                'GET'
            );
            setMunicipalities(municipalities || []);
        } catch (error) {
            console.error('Failed to fetch municipalities:', error);
            setMunicipalities([]);
        }
    }, []);

    useEffect(() => {
        fetchDistricts();
    }, [fetchDistricts]);

    const handleChange = (type, value) => {
        setSelectedValues(prev => {
            const newValues = { ...prev, [type]: value };

            // Reset dependent fields
            if (type === 'district') {
                newValues.city = '';
                newValues.municipality = '';
                fetchCities(value);
                setMunicipalities([]);
            } else if (type === 'city') {
                newValues.municipality = '';
                fetchMunicipalities(value);
            }

            return newValues;
        });
    };

    return (
        <Grid container spacing={2} direction={"column"}>
            <Grid container item direction={"row"}>
                <Grid item size={{ xs: 6 }}>
                    <FormControl fullWidth>
                        <InputLabel>Distrito</InputLabel>
                        <Select
                            value={selectedValues.district}
                            label="Distrito"
                            onChange={(e) => handleChange('district', e.target.value)}
                        >
                            {districts.map((district, index) => (
                                <MenuItem key={index} value={district.name}>
                                    {district.name}
                                </MenuItem>
                            ))}
                        </Select>
                    </FormControl>
                </Grid>
                {selectedValues.district && <Grid item size={{ xs: 6 }}>
                    <Link to={{
                        pathname: "/distrito",
                        search: `?name=${selectedValues.district}`
                    }}>
                        <Button variant="contained" sx={{ mt: 5 }}>Ver o Meu Distrito</Button>
                    </Link>
                </Grid>}
            </Grid>
            <Grid container item direction={"row"}>
                <Grid item size={{ xs: 6 }}>
                    {selectedValues.district && (
                        <FormControl fullWidth sx={{ mt: 5 }}>
                            <InputLabel>Cidade</InputLabel>
                            <Select
                                value={selectedValues.city}
                                label="Cidade"
                                onChange={(e) => handleChange('city', e.target.value)}
                            >
                                {cities.map((city, index) => (
                                    <MenuItem key={index} value={city.name}>
                                        {city.name}
                                    </MenuItem>
                                ))}
                            </Select>
                        </FormControl>
                    )}
                </Grid>
                {selectedValues.city && (
                    <Grid item size={{ xs: 6 }}>
                        <Link to={{
                            pathname: "/cidade",
                            search: `?name=${selectedValues.city}`
                        }}>
                            <Button variant="contained" sx={{ mt: 5 }}>Ver a Minha Cidade</Button>
                        </Link>
                    </Grid>
                )}
            </Grid>
            <Grid container item>
                {selectedValues.city && (
                    <FormControl fullWidth sx={{ mt: 5 }}>
                        <InputLabel>Freguesia</InputLabel>
                        <Select
                            value={selectedValues.municipality}
                            label="Freguesia"
                            onChange={(e) => handleChange('municipality', e.target.value)}
                        >
                            {municipalities.map((municipality, index) => (
                                <MenuItem key={index} value={municipality.name}>
                                    {municipality.name}
                                </MenuItem>
                            ))}
                        </Select>
                    </FormControl>
                )}
            </Grid>
            {selectedValues.municipality && (
                <Link to={{
                    pathname: "/freguesia",
                    search: `?name=${selectedValues.municipality}`
                }}>
                    <Button variant="contained" sx={{ mt: 5 }}>Ver a Minha Região</Button>
                </Link>
            )}
        </Grid>
    );
};

export default SelectMunicipality;