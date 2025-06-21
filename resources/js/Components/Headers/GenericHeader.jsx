import React from 'react'
import { Grid } from '@mui/material';
import { Link } from '@inertiajs/react'
import { Image } from 'react-bootstrap';
import logo from '../../../images/logo.png';

const GenericHeader = () => {
    return (
        <header>
            <Link href={route('home')} >
                <Grid container direction={"row"} sx={{ alignItems: { md: "center" }, pt: 2.5, pb: 1 }}>
                    <Grid item size={{ sm: 2, md: 1 }} sx={{ pl: 3 }}>
                        <Image id='logo' src={logo} roundedCircle />
                    </Grid>
                    <Grid item container direction={"column"} sx={{ pl: 2 }} size={{ xs: 9, md: 8 }}>
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