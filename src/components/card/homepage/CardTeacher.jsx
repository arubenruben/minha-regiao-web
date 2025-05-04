import React from 'react'
import Grid from '@mui/material/Grid';
import Image from 'react-bootstrap/Image';

const CardTeacher = ({ name }) => {

    const RicardoBody = () => {
        return (
            <div>
                <p>Ricardo Carvalho</p>
                <p>Professor de Programação</p>
                <p>Universidade de Aveiro</p>
            </div>
        )
    }

    const SergioBody = () => {
        return (
            <div>
                <p>Sérgio Ferreira</p>
                <p>Professor de Programação</p>
                <p>Universidade de Aveiro</p>
            </div>
        )
    }

    return (
        <Grid className='card-teacher' container direction="column" sx={{ justifyContent: 'center', alignItems: 'center' }} >
            <Grid item xs={8}>
                <Image />
            </Grid>
            <Grid item xs={12}>
                {name === "ssn" ? <SergioBody /> : <RicardoBody />}
            </Grid>
        </Grid>
    )
}

export default CardTeacher
