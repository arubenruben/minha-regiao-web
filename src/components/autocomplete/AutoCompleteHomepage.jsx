import React from 'react'
import Autocomplete from '@mui/material/Autocomplete';
import { TextField } from '@mui/material';
import { useNavigate } from 'react-router-dom';


const AutoCompleteHomepage = (props) => {
    const navigate = useNavigate();

    return (
        <Autocomplete
            disablePortal
            options={props.regions}
            getOptionLabel={(option) => option.name}
            renderOption={(props, option) => (
                <li {...props} key={option.id}>
                    {option.name}
                </li>
            )}
            groupBy={(option) => option.type}
            onChange={(event, value) => {
                if (value) {
                    // Fetch the region by ID
                    props.fetchRegionsById(value.id).then((region) => {
                        // Check if the region has a parent
                        if (region.type === "Distrito") {
                            navigate(`/distrito/${region.name}`);
                        } else if (region.type === "Concelho") {
                            navigate(`/cidade/${region.name}`);
                        } else if (region.type === "Freguesia") {
                            navigate(`/freguesia/${region.name}`);
                        } else {
                            console.error("Unknown region type:", region.type);
                        }
                    });
                }
            }}
            label="Região"
            isOptionEqualToValue={(option, value) => option.id === value.id}
            renderInput={(params) => <TextField {...params} placeholder="Insira o Nome da sua Região" />}
        />
    )
}

export default AutoCompleteHomepage
