import React from 'react'
import Grid from '@mui/material/Grid';
import Image from 'react-bootstrap/Image';
import ssn from '../../../assets/images/sergio.jpg'
import ricardo from '../../../assets/images/RC5.jpg'
import LinkedInIcon from '@mui/icons-material/LinkedIn';
import EmailIcon from '@mui/icons-material/Email';

const CardTeacher = ({ name }) => {

    const RicardoBody = () => {
        return (
            <Grid container direction="column" sx={{ textAlign: 'center' }}>
                <p>Ricardo Campos <a href="mailto:ricardo.campos@ubi.pt"><EmailIcon /></a></p>
                <p>Professor Auxiliar</p>
                <p>Universidade da Beira Interior</p>
            </Grid>
        )
    }

    const SergioBody = () => {
        return (
            <Grid container direction="column" sx={{ textAlign: 'center' }}>
                <p>Sérgio Nunes <a href="mailto:sergio.nunes@inesctec.pt"><EmailIcon /></a></p>
                <p>Professor Associado</p>
                <p>FEUP-Universidade do Porto</p>
            </Grid>
        )
    }

    return (
        <Grid className='card-teacher' container direction="column" sx={{ justifyContent: 'center', alignItems: 'center' }} >
            <Grid item xs={8} sx={{ mb: 1.5 }}>
                {name === "ssn" ? <Image src={ssn} roundedCircle /> : <Image src={ricardo} roundedCircle />}
            </Grid>
            <Grid item xs={12}>
                {name === "ssn" ? <SergioBody /> : <RicardoBody />}
            </Grid>
        </Grid>
    )
}

export default CardTeacher
