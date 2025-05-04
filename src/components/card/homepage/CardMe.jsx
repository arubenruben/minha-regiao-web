import React from 'react'
import Grid from '@mui/material/Grid';
import picture from '../../../assets/images/ruben.png'
import Image from 'react-bootstrap/Image';

const CardMe = () => {
    return (
        <Grid id="card-me" container direction="row">
            <Grid item>
                <Image src={picture} />
            </Grid>
            <Grid item container direction="column">
                <Grid item>


                </Grid>
                <Grid item>

                </Grid>
            </Grid>
        </Grid>
    )
}

export default CardMe
