import React from 'react'
import Grid from '@mui/material/Grid';
import Image from 'react-bootstrap/Image';
import { logo } from '../assets/images/logo.png'
import Carousel from 'react-bootstrap/Carousel';
import SubTitleCarousel from '../components/carousel/SubTitleCarousel';


const HomepageLayout = () => {
    return (
        <Grid container direction="column" sx={{ justifyContent: "center", alignItems: "center" }} >
            <Grid container direction="row">
                <Grid container direction="column">
                    <Grid item><h1 id="title">A Minha Região</h1></Grid>
                    <Grid item><SubTitleCarousel /></Grid>
                </Grid>
                <Grid item><Image src={logo} /></Grid>
            </Grid>
        </Grid>
    )
}

export default HomepageLayout
