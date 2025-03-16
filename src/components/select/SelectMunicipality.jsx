import MenuItem from '@mui/material/MenuItem';
import React, { useState, useEffect, useCallback } from 'react';
import FormControl from '@mui/material/FormControl';
import { InputLabel, Select } from '@mui/material';
import { sendRequest } from '../../utils';
import Button from '@mui/material/Button';
import { Link } from "react-router";
import Grid from '@mui/material/Grid2';

// Extracted reusable component for select + button
const SelectWithButton = ({
    label,
    value,
    options,
    onChange,
    buttonText,
    linkPath,
    selectedValue
}) => (
    <Grid container item direction="row" spacing={2}>
        <Grid item size={{ xs: 6 }}>
            <FormControl fullWidth sx={{ mt: 5 }}>
                <InputLabel>{label}</InputLabel>
                <Select
                    value={value}
                    label={label}
                    onChange={onChange}
                >
                    {options.map((option, index) => (
                        <MenuItem key={index} value={option.name}>
                            {option.name}
                        </MenuItem>
                    ))}
                </Select>
            </FormControl>
        </Grid>
        {selectedValue && (
            <Grid item size={{ xs: 6 }}>
                <Link to={{
                    pathname: linkPath,
                    search: `?name=${encodeURIComponent(selectedValue)}`
                }}>
                    <Button variant="contained" sx={{ mt: 5 }}>
                        {buttonText}
                    </Button>
                </Link>
            </Grid>
        )}
    </Grid>
);

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
            const data = await sendRequest(
                `${process.env.REACT_APP_ENDPOINT}/districts/`,
                'GET'
            );
            setDistricts(data || []);
        } catch (error) {
            console.error('Failed to fetch districts:', error);
            setDistricts([]);
        }
    }, []);

    const fetchCities = useCallback(async (district) => {
        if (!district) return;
        try {
            const data = await sendRequest(
                `${process.env.REACT_APP_ENDPOINT}/cities/?district=${district}`,
                'GET'
            );
            setCities(data || []);
        } catch (error) {
            console.error('Failed to fetch cities:', error);
            setCities([]);
        }
    }, []);

    const fetchMunicipalities = useCallback(async (city) => {
        if (!city) return;
        try {
            const data = await sendRequest(
                `${process.env.REACT_APP_ENDPOINT}/municipalities/?city=${city}`,
                'GET'
            );
            setMunicipalities(data || []);
        } catch (error) {
            console.error('Failed to fetch municipalities:', error);
            setMunicipalities([]);
        }
    }, []);

    useEffect(() => {
        fetchDistricts();
    }, [fetchDistricts]);

    const handleChange = (type) => (e) => {
        const value = e.target.value;
        setSelectedValues(prev => {
            const newValues = { ...prev, [type]: value };

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
        <Grid container spacing={2} direction="column">
            {/* District Selection */}
            <SelectWithButton
                label="Distrito"
                value={selectedValues.district}
                options={districts}
                onChange={handleChange('district')}
                buttonText="Ver o Meu Distrito"
                linkPath="/distrito"
                selectedValue={selectedValues.district}
            />

            {/* City Selection */}
            {selectedValues.district && (
                <SelectWithButton
                    label="Cidade"
                    value={selectedValues.city}
                    options={cities}
                    onChange={handleChange('city')}
                    buttonText="Ver a Minha Cidade"
                    linkPath="/cidade"
                    selectedValue={selectedValues.city}
                />
            )}

            {/* Municipality Selection */}
            {selectedValues.city && (
                <Grid container item>
                    <FormControl fullWidth sx={{ mt: 5 }}>
                        <InputLabel>Freguesia</InputLabel>
                        <Select
                            value={selectedValues.municipality}
                            label="Freguesia"
                            onChange={handleChange('municipality')}
                        >
                            {municipalities.map((municipality, index) => (
                                <MenuItem key={index} value={municipality.name}>
                                    {municipality.name}
                                </MenuItem>
                            ))}
                        </Select>
                    </FormControl>
                </Grid>
            )}

            {selectedValues.municipality && (
                <Link to={{
                    pathname: "/freguesia",
                    search: `?name=${encodeURIComponent(selectedValues.municipality)}`
                }}>
                    <Button variant="contained" sx={{ mt: 5, ml: 2 }}>
                        Ver a Minha Região
                    </Button>
                </Link>
            )}
        </Grid>
    );
};

export default SelectMunicipality;