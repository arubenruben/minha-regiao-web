import React, { useState } from 'react'
import Grid from '@mui/material/Grid';
import GenericFooter from '@/Components/Footers/GenericFooter';
import { Image } from 'react-bootstrap';
import logo from '../../images/logo.png';
import arquivo from '../../images/arquivo.jpg';
import AutoCompleteHomepage from '@/Components/AutoComplete/AutoCompleteHomepage';
import PlotHomepage from '@/Components/Plots/PlotHomepage';
import HomepageMap from '@/Components/Maps/HomepageMap';
import CardAbstencion from '@/Components/Cards/CardAbstencion';
import PlotHomepageAbstention from '@/Components/Plots/PlotHomepageAbstention';
import CardArquivoPT from '@/Components/Cards/CardArquivoPT';
import Container from '@mui/material/Container';
import SliderHomepage from '@/Components/Sliders/SliderHomepage';
import OpenInNewIcon from '@mui/icons-material/OpenInNew';
import Button from '@mui/material/Button';

const Homepage = ({ regions, elections, abstencion, districts }) => {
    const [selectedYear, setSelectedYear] = useState()

    return (
        <Container maxWidth={{ sm: false, md: "lg", lg: "xl", xl: "xl" }} disableGutters={true}>
            <Grid id="homepage-header" container direction="row" sx={{ justifyContent: "flex-end", alignItems: "center" }}>
                <Grid item sx={{ mt: 2, pr: 2 }}>
                    <Button href={route('about-us')} variant="text">
                        Sobre Nós
                    </Button>
                </Grid>
                <Grid item sx={{ mt: 2, pr: 2 }}>
                    <Button href="/api/docs" target="_blank" variant="text">
                        Visita a nossa API
                        <OpenInNewIcon />
                    </Button>
                </Grid>
            </Grid>
            <Grid id="homepage-front" container direction="column" sx={{ justifyContent: "center", alignItems: "center", pt: { xs: 3, md: 10 }, height: { xs: "300px", lg: "60vh" } }} >
                <Grid container direction="row" size={{ xs: 12 }} sx={{ justifyContent: "center", alignItems: "center", pb: 3 }}>
                    <Grid container direction="column" size={{ xs: 8.5, md: 3 }}>
                        <Grid item size={12}><h1 id="title" className="blue-at">A Minha Região</h1></Grid>
                        <Grid item size={12}><h5 id="subtitle" className="blue-at">O teu Portal Autárquico</h5></Grid>
                    </Grid>
                    <Grid item size={{ xs: 2, md: 1 }} sx={{ justifyContent: "center" }}>
                        <Image id="homepage-logo" src={logo} roundedCircle />
                    </Grid>
                </Grid>
                <Grid item size={{ xs: 10, md: 6 }}>
                    <AutoCompleteHomepage regions={regions} />
                </Grid>
                <Grid item sx={{ mt: 3, display: { xs: "none", md: "block" } }}>
                    <h6 id="slogan">Informa-te sobre o histórico eleitoral autárquico da tua região.</h6>
                </Grid>
            </Grid>
            <Container maxWidth={{ sm: false, md: "lg", lg: "xl", xl: "xl" }} sx={{ mt: 5 }}>
                <Grid item container direction="row" sx={{ mx: 3, alignItems: "center", justifyContent: "space-around" }}>
                    <Grid container direction="column" size={{ xs: 12, md: 6 }} sx={{ mr: { md: 8 } }} >
                        <Grid item>
                            <h2>Panorama Autárquico Nacional em {selectedYear}</h2>
                            <p className="ssn-subtitle">Quantas Câmaras Municipais lidera cada partido?</p>
                        </Grid>
                        <Grid item container direction="column">
                            <Grid item>
                                <PlotHomepage elections={elections} selectedYear={selectedYear} />
                            </Grid>
                            <Grid item>
                                <SliderHomepage elections={elections} setSelectedYear={setSelectedYear} />
                            </Grid>
                        </Grid>
                    </Grid>
                    <Grid item size={{ xs: 12, md: 4 }} sx={{ mt: { xs: 3, md: 0 } }}>
                        <HomepageMap districts={districts} />
                        <p className="ssn-subtitle">Navega pelo nosso mapa</p>
                    </Grid>
                </Grid>
                <hr />
                <Grid item container direction="column" sx={{ mt: 3, mx: { md: 6 } }}>
                    <Grid item container direction="row" sx={{ alignItems: "center", mt: 1 }}>
                        <Grid item size={{ xs: 12, md: 6 }} sx={{ height: { md: "380px" }, mb: { xs: 5, md: 0 } }}>
                            <CardAbstencion />
                        </Grid>
                        <Grid item size={{ xs: 12, md: 5 }} sx={{ ml: { md: 10 } }} >
                            <PlotHomepageAbstention abstencion={abstencion} />
                        </Grid>
                    </Grid>
                </Grid>
                <hr />
                <Grid item container direction="row" sx={{ mt: 3, mx: { md: 6 } }}>
                    <Grid item container direction="row">
                        <Grid item size={{ xs: 12, md: 6 }}>
                            <CardArquivoPT />
                        </Grid>
                        <Grid item size={{ xs: 12, md: 4 }} sx={{ ml: { md: 15 } }} >
                            <a href="https://sobre.arquivo.pt/pt/colabore/premios-arquivo-pt/premio-arquivo-pt-2025/" target="_blank" rel="noopener noreferrer">
                                <Image id="image-arquivo" src={arquivo} />
                            </a>
                        </Grid>
                    </Grid>
                </Grid>
                <GenericFooter />
            </Container>
        </Container>
    )
}
export default Homepage
