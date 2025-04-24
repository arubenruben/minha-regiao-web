import React, { useState, useEffect } from 'react'
import Grid from '@mui/material/Grid';
import Image from 'react-bootstrap/Image';
import logo from '../assets/images/logo.png'
import Autocomplete from '@mui/material/Autocomplete';
import SubTitleCarousel from '../components/carousel/SubTitleCarousel';
import { TextField } from '@mui/material';
import { sendRequest } from '../utils';
import { Link, useNavigate } from 'react-router-dom';

const Homepage = (props) => {
    const navigate = useNavigate();

    const [regions, setRegions] = useState([]);


    // Fetch regions from the API
    const fetchRegions = async () => {
        const response = await sendRequest(
            `${process.env.REACT_APP_ENDPOINT}/freguesias_pt_entries/`,
            "GET"
        );
        setRegions(response);
    };

    const fetchRegionsById = async (id) => {
        return await sendRequest(
            `${process.env.REACT_APP_ENDPOINT}/freguesias_pt_entries/${id}`,
            "GET"
        );
    }

    useEffect(() => {
        fetchRegions().catch((error) => {
            console.error('Error fetching regions:', error);
        });
    }, []);

    return (
        <Grid container direction="column" sx={{ justifyContent: "center", alignItems: "center" }} >
            <Grid container direction="row">
                <Grid container direction="column" sx={{ "width": "400px" }}>
                    <Grid item><h1 id="title">A Minha Região</h1></Grid>
                    <Grid item sx={{ "width": "100%" }}><SubTitleCarousel /></Grid>
                </Grid>
                <Grid item><Image src={logo} /></Grid>
            </Grid>
            <Grid item size={8}>
                <Autocomplete
                    disablePortal
                    options={regions.sort((a, b) => a.name.localeCompare(b.name))}
                    getOptionLabel={(option) => option.name}
                    renderOption={(props, option) => (
                        <li {...props} key={option.id}>
                            {option.name}
                        </li>
                    )}
                    onChange={(event, value) => {
                        if (value) {
                            // Fetch the region by ID
                            fetchRegionsById(value.id).then((region) => {
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
            </Grid>
        </Grid>
    )
}

export default Homepage