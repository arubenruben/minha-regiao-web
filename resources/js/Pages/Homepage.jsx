import React, { useState } from 'react'
import Grid from '@mui/material/Grid';
import GenericFooter from '@/Components/Footer/GenericFooter';
import { Image } from 'react-bootstrap';
import logo from '../../images/logo.png';
import arquivo from '../../images/arquivo.jpg';
import AutoCompleteHomepage from '@/Components/AutoComplete/AutoCompleteHomepage';
import PlotHomepage from '@/Components/Plot/PlotHomepage';
import SliderHomepage from '@/Components/Slider/SliderHomepage';
import HomepageMap from '@/Components/Map/HomepageMap';
import CardAbstencion from '@/Components/Card/CardAbstencion';
import PlotHomepageAbstention from '@/Components/Plot/PlotHomepageAbstention';
import CardArquivoPT from '@/Components/Card/CardArquivoPT';

const Homepage = ({ regions, electionSummary, electionYears, districts, abstention }) => {

    const [selectedYear, setSelectedYear] = useState(null)

    return (
        <Grid direction="column">
            <Grid item direction="column">
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
                <Grid item container direction="row" sx={{ mx: 3, mt: 3, alignItems: "center", justifyContent: "space-around" }}>
                    <Grid container direction="column" size={{ xs: 12, md: 6 }} sx={{ mr: { md: 8 } }} >
                        <Grid item>
                            <h2>Panorama Autárquico Nacional em {selectedYear}</h2>
                            <p className="ssn-subtitle">Quantas Câmaras Municipais lidera cada partido?</p>
                        </Grid>
                        <Grid item container direction="column">
                            <Grid item>
                                <PlotHomepage electionSummary={electionSummary} />
                            </Grid>
                            <Grid item>
                                <SliderHomepage electionYears={electionYears} setSelectedYear={setSelectedYear} />
                            </Grid>
                        </Grid>
                    </Grid>
                    <Grid item size={{ xs: 12, md: 4 }}>
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
                            {abstention && <PlotHomepageAbstention abstention={abstention} />}
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
            </Grid>
        </Grid>
    )
}
export default Homepage
