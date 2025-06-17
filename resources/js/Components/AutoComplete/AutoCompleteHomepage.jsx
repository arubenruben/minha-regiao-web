import React, { useState } from 'react';
import { Link } from '@inertiajs/react';
import { TextField } from '@mui/material';
import Autocomplete, { createFilterOptions } from '@mui/material/Autocomplete';

const AutoCompleteHomepage = ({ regions }) => {
    const defaultFilterOptions = createFilterOptions();

    const [inputValue, setInputValue] = useState('');

    // Sort regions by type to avoid duplicate headers
    const sortedRegions = regions.sort((a, b) => a.type.localeCompare(b.type));

    const getRouteConfig = (option) => {
        const routeMap = {
            'Distrito': { name: 'districts.show', params: { district: option.name } },
            'Concelho': { name: 'cities.show', params: { city: option.name } },
            'Freguesia': { name: 'parishes.show', params: { parish: option.id } }
        };
        return routeMap[option.type];
    };

    return (
        <Autocomplete
            disablePortal
            options={sortedRegions}
            getOptionLabel={(option) => option.name}
            renderOption={(props, option) => {
                const routeConfig = getRouteConfig(option);

                if (!routeConfig) {
                    console.error('No route configuration found for option:', option);
                    return null;
                }

                return (
                    <Link key={option.id} href={route(routeConfig.name, routeConfig.params)} className="autocomplete-link">
                        <li className="autocomplete-options" {...props}>
                            {option.name}
                        </li>
                    </Link>
                );
            }}
            groupBy={(option) => option.type}
            onChange={(_event, value) => {
                if (value) {
                    setInputValue(value.name);
                }
            }}
            filterOptions={(options, state) => {
                return state.inputValue.trim() === '' ? [] : defaultFilterOptions(options, state);
            }}
            label="Região"
            isOptionEqualToValue={(option, value) => option.id === value.id}
            renderInput={(params) => <TextField {...params} placeholder="Insere o Nome da Tua Região" />}
            freeSolo
        />
    )
}

export default AutoCompleteHomepage