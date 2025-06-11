import React from 'react'
import Grid from '@mui/material/Grid';
import picture from '../../../assets/images/ruben.png'
import Image from 'react-bootstrap/Image';
import LinkedInIcon from '@mui/icons-material/LinkedIn';
import EmailIcon from '@mui/icons-material/Email';

const CardMe = () => {
    const currentYear = new Date().getFullYear()
    const birthYear = 1999; // Replace with the actual birth year

    return (
        <Grid id="card-me" container direction="row" sx={{ alignItems: 'center' }}>
            <Grid item size={2} >
                <Image src={picture} />
            </Grid>
            <Grid id="card-me-text" item container direction="column" size={8} sx={{ height: '100%', ml: 1.5 }}>
                <Grid item>
                    <Grid container direction="row" sx={{ alignItems: 'center', mb: 0.1 }}>
                        <Grid item sx={{ mr: 0.5 }}>
                            <h3 id="name">Rúben Almeida</h3>
                        </Grid>
                        <Grid item>
                            <a href="https://www.linkedin.com/in/almeida-ruben/" target="_blank" rel="noopener noreferrer">
                                <LinkedInIcon />
                            </a>
                        </Grid>
                        <Grid item>
                            <a href="mailto:rfalmeida@fe.up.pt>" target="_blank" rel="noopener noreferrer">
                                <EmailIcon />
                            </a>
                        </Grid>
                    </Grid>
                </Grid>
                <Grid item>
                    <h6 id="sub-title">Mestre em Engenharia Informática</h6>
                </Grid>
                <Grid item>
                    <p>
                        <span className="empathize-homepage">Defensor acérrimo da regionalização como motor do desenvolvimento do país, </span>
                        desenvolvi o <span className="empathize-homepage">MinhaRegião.pt</span> como <i>side project</i> numa lógica de devolver
                        à comunidade algo que considero valioso, <span>informação sobre a política nacional. 
                        Promover a democracia participativa e uma tomada de decisão responsável.</span>                        
                    </p>
                    <p>
                        Acredito num futuro onde os cidadãos serão voz ativas na política e a regionalização
                        será a forma de o conseguir. A proximidade entre os cidadãos cada vez mais educados e o estado será uma inevitabilidade.
                    </p>
                    <p>Sou responsável pela implementação de IA no dstGroup, assistente convidado na Faculdade de Engenharia da Universidade do Porto e colaborador externo do LIAAD-INESC TEC</p>
                </Grid>
                <Grid item>
                    <p>Sou especializado em NLP em Português Europeu. Mas acima de tudo, sou um orgulhoso portuense de {currentYear - birthYear - 1} anos inconformado com a contínua descrença dos cidadãos na política,
                        com a crescente macrocefalia da capital sobre o resto dos territórios e do afastamento dos cidadãos da decisão política, condenando o país à estagnação.</p>
                </Grid>
            </Grid>
        </Grid>
    )
}

export default CardMe
