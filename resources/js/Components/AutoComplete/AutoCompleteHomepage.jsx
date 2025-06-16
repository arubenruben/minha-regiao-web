import React, { useState } from 'react'
import Autocomplete, { createFilterOptions } from '@mui/material/Autocomplete';
import { TextField } from '@mui/material';

const AutoCompleteHomepage = ({ regions }) => {
    const defaultFilterOptions = createFilterOptions();

    const [inputValue, setInputValue] = useState('');

    return (
        <Autocomplete
            disablePortal
            options={regions}
            getOptionLabel={(option) => option.name}
            renderOption={(region, option) => (
                <li className="autocomplete-options" {...region} key={option.id}>
                    {option.name}
                </li>
            )}
            groupBy={(option) => option.type}
            onChange={(event, value) => {
                if (value) {
                    setInputValue(value.name);
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