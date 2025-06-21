import React from 'react';
import { Link, router } from '@inertiajs/react';
import { TextField } from '@mui/material';
import Autocomplete from '@mui/material/Autocomplete';

const AutoCompleteHomepage = ({ regions }) => {
    const typeOrder = { 'District': 1, 'City': 2, 'Parish': 3 };

    const sortedRegions = regions.sort((a, b) => {
        // First sort by type order
        const typeComparison = typeOrder[a.type] - typeOrder[b.type];
        if (typeComparison !== 0) {
            return typeComparison;
        }
        // Then sort alphabetically by name within the same type
        return a.name.localeCompare(b.name);
    });

    const getRouteConfig = (option) => {
        const routeMap = {
            'District': { name: 'districts.show', params: { district: option.name } },
            'City': { name: 'cities.show', params: { city: option.name } },
            'Parish': { name: 'parishes.show', params: { freguesias_pt_entry_id: option.id } }
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
            groupBy={(option) => {
                if (option.type === 'District') {
                    return 'Distritos';
                }
                if (option.type === 'City') {
                    return 'Cidades';
                }
                if (option.type === 'Parish') {
                    return 'Freguesias';
                }
            }}
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
