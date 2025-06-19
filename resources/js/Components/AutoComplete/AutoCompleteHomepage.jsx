import React from 'react';
import { Link } from '@inertiajs/react';
import { TextField } from '@mui/material';
import Autocomplete from '@mui/material/Autocomplete';

const AutoCompleteHomepage = ({ regions }) => {
    const sortedRegions = regions.sort((a, b) => a.type.localeCompare(b.type));

    const getRouteConfig = (option) => {
        const routeMap = {
            'District': { name: 'districts.show', params: { district: option.name } },
            'City': { name: 'cities.show', params: { city: option.name } },
            'Parish': { name: 'parishes.show', params: { parish: option.id } }
        };
        return routeMap[option.type];
    };
    
    return (
        <Autocomplete
            options={sortedRegions}
            getOptionLabel={(option) => option.name}
            groupBy={(option) => option.type}
            renderOption={(props, option) => {
                const { key, ...optionProps } = props;
                const routeConfig = getRouteConfig(option);

                return (
                    <Link key={key} href={route(routeConfig.name, routeConfig.params)}>
                        <li {...optionProps}>
                            {option.name}
                        </li>
                    </Link>
                );
            }}
            renderInput={(params) => <TextField {...params} placeholder="Insere o Nome da Tua Região" />}
        />
    );
};

export default AutoCompleteHomepage;
