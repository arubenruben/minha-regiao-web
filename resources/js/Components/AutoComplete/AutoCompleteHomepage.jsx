import React from 'react';
import { Link, router } from '@inertiajs/react';
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

    const handleChange = (event, value) => {
        if (value) {
            const routeConfig = getRouteConfig(value);
            router.visit(route(routeConfig.name, routeConfig.params));
        }
    };

    return (
        <Autocomplete
            options={sortedRegions}
            getOptionLabel={(option) => option.name}
            groupBy={(option) => option.type}
            onChange={handleChange}
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
