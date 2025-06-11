import React from 'react'
import Grid from '@mui/material/Grid';
import Image from 'react-bootstrap/Image';
import ssn from '../../../assets/images/sergio.jpg'
import ricardo from '../../../assets/images/RC5.jpg'
import rfa from '../../../assets/images/ruben.png'
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

    const RubenBody = () => {
        return (
            <Grid container direction="column" sx={{ textAlign: 'center' }}>
                <p>Rúben Almeida

                    <a href="https://www.linkedin.com/in/almeida-ruben/" target="_blank" rel="noopener noreferrer">
                        <LinkedInIcon />
                    </a>

                    <a href="mailto:rfalmeida@fe.up.pt" target="_blank" rel="noopener noreferrer">
                        <EmailIcon />
                    </a>

                </p>
                <p>Professor Assistente</p>
                <p>FEUP-Universidade do Porto</p>
            </Grid>
        )
    }

    const getImage = () => {
        switch (name) {
            case "ssn": return ssn;
            case "ricardo": return ricardo;
            case "rfa": return rfa;
            default: return ricardo;
        }
    }

    const getBody = () => {
        switch (name) {
            case "ssn": return <SergioBody />;
            case "rfa": return <RubenBody />;
            default: return <RicardoBody />;
        }
    }

    return (
        <Grid className='card-teacher' container direction="column" sx={{ justifyContent: 'center', alignItems: 'center', mb: { xs: 5, md: 0 } }} >
            <Grid item xs={12} sx={{ textAlign: 'center', mb: 1 }}>
                <Image src={getImage()} roundedCircle />
            </Grid>
            <Grid item xs={12}>
                {getBody()}
            </Grid>
        </Grid>
    )
}

export default CardTeacher
