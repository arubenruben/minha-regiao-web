import React, {useState} from 'react'
import Autocomplete, { createFilterOptions } from '@mui/material/Autocomplete';
import { TextField } from '@mui/material';
import { useNavigate } from 'react-router-dom';

const AutoCompleteHomepage = (props) => {
    const navigate = useNavigate();
    const defaultFilterOptions = createFilterOptions();

    const [inputValue, setInputValue] = useState('');

    return (
        <Autocomplete
            disablePortal
            options={props.regions}
            getOptionLabel={(option) => option.name}
            renderOption={(props, option) => (
                <li className="autocomplete-options" {...props} key={option.id}>
                    {option.name}
                </li>
            )}
            groupBy={(option) => option.type}
            onChange={(event, value) => {
                if (value) {
                    setInputValue(value.name);
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
            filterOptions={(options, state) => {
                // Return empty array if input is empty
                return state.inputValue.trim() === '' ? [] : defaultFilterOptions(options, state);
            }}
            label="Região"            
            isOptionEqualToValue={(option, value) => option.id === value.id}
            renderInput={(params) => <TextField {...params} placeholder="Insere o Nome da Tua Região" />}
            freeSolo
            //noOptionsText={'Introduza o Nome da sua Região' ? !inputValue : 'Sem resultados'}
        />
    )
}

export default AutoCompleteHomepage
