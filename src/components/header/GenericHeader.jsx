import React from 'react'
import { Grid } from '@mui/material';
import { Link } from 'react-router-dom';
import { Image } from 'react-bootstrap';
import logo from '../../assets/images/logo.png'

const GenericHeader = () => {
    return (
        <header>
            <Link to="/" style={{ textDecoration: "none" }}>
                <Grid container direction={"row"} sx={{ alignItems: "center", pt: 2.5, pb: 1, pl: 3 }}>
                    <Grid item xs={12} sm={6} md={1}>
                        <Image id='logo' src={logo} roundedCircle />
                    </Grid>
                    <Grid item container direction={"column"} xs={12} sm={6} md={8} sx={{ pl: 2 }}>
                        <Grid item>
                            <h1>A minha Região</h1>
                        </Grid>
                        <Grid item>
                            <h5 id="subtitle">O seu Portal Autárquico</h5>
                        </Grid>
                    </Grid>
                </Grid>
            </Link>
        </header >
    )
}

export default GenericHeader