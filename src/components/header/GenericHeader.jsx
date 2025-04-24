import { Button, Grid } from '@mui/material';
import React from 'react'
import { Link } from "react-router";
import { Image } from 'react-bootstrap';
import logo from '../../assets/images/logo.png'

const GenericHeader = (props) => {
    return (
        <header>
            <Grid container direction={"row"}>
                <Grid item xs={12} sm={6} md={8}>
                    <h1>A minha Região</h1>
                </Grid>
                <Grid item xs={12} sm={6} md={4}>
                    <Link to="/">
                        <Image src={logo} alt="Logo" />
                    </Link>
                </Grid>

                Isto é um header genérico
                <Link to="/">
                    <Button variant="contained" color="primary">
                        Home
                    </Button>
                </Link>
            </Grid>
        </header>
    )
}

export default GenericHeader