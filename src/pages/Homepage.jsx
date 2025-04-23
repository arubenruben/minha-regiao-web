import React, { useState, useEffect } from 'react'
import Grid from '@mui/material/Grid';
import Image from 'react-bootstrap/Image';
import logo from '../assets/images/logo.png'
import Autocomplete from '@mui/material/Autocomplete';
import SubTitleCarousel from '../components/carousel/SubTitleCarousel';
import { TextField } from '@mui/material';

const Homepage = (props) => {
    const [regions, setRegions] = useState([]);

    const [labelOptions, setLabelOptions] = useState([
        "Qual o distrito?",
        "Qual a freguesia?",
        "Qual a localidade?",
        "Qual o concelho?"
    ]);

    const [currentLabelIndex, setCurrentLabelIndex] = useState(0);

    // Generate alarm every 3 seconds to change the label
    useEffect(() => {
        const interval = setInterval(() => {
            setCurrentLabelIndex((prevIndex) => (prevIndex + 1) % labelOptions.length);
        }, 5000);

        return () => clearInterval(interval);
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
                    options={regions}
                    label="Região"
                    renderInput={(params) => <TextField {...params} placeholder={labelOptions[currentLabelIndex]} />}
                />
            </Grid>
        </Grid>
    )
}

export default Homepage