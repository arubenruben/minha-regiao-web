import React, { useState } from 'react'
import GenericLayout from '@/Layouts/GenericLayout'
import { Link } from '@inertiajs/react'
import Grid from '@mui/material/Grid';
import Breadcrumbs from '@mui/material/Breadcrumbs';
import LocalMap from '@/Components/Maps/LocalMap';
import AccordionWikipedia from '@/Components/Accordion/AccordionWikipedia';
import AccordionPlots from '@/Components/Accordion/AccordionPlots';
import PlotVoters from '@/Components/Plots/PlotVoters';
import PlotAbstentionCity from '@/Components/Plots/PlotAbstentionCity';
import PlotHistory from '@/Components/Plots/PlotHistory';
import TableCityHistoric from '@/Components/Tables/TableCityHistoric';
import TableCity from '@/Components/Tables/TableCity';
import PlotNumberCities from '@/Components/Plots/PlotNumberCities';
import SliderCity from '@/Components/Sliders/SliderCity';


const City = ({ city, electionYears }) => {
    console.log(city);


    const [selectedElectionYear, setSelectedElectionYear] = useState(null);

    const breadCrumbs = [
        <Link key="1" href="/">
            Início
        </Link>,
        <Link key="2" href={`/distrito/${city.district_name}`}>
            {city.district.name}
        </Link>,
        <Link key="3" to={`/cidade/${city.name}`}>
            {city.name}
        </Link>
    ]

    return (
        <GenericLayout main={
            <Grid container direction="column">
                <Grid item container direction="row" sx={{ alignItems: "center", mt: 2, ml: 2 }}>
                    <Grid item>
                        <Breadcrumbs separator=">" sx={{ mb: 2 }}>
                            {breadCrumbs}
                        </Breadcrumbs>
                    </Grid>
                </Grid>
                <Grid item container direction="row" sx={{ justifyContent: "space-around", mt: 3, mb: 5 }}>
                    <Grid item size={{ xs: 0, md: 4 }} sx={{ display: { xs: "none", md: "block" } }}>
                        <LocalMap
                            localities={city.municipalities}
                            polygon_centroid={city.polygon_centroid}
                            endpoint={"freguesia"} />
                        <p className="ssn-subtitle">Navega pelo nosso mapa</p>
                    </Grid>
                    <Grid item container direction="column" size={{ xs: 12, md: 7 }}>
                        <Grid item>
                            <AccordionWikipedia name={`Cidade ${city.name}`} wikipedia={city.wikipedia} />
                        </Grid>
                        <Grid item sx={{ mt: { xs: 3 }, display: { xs: "block", md: "none" } }}>
                            <LocalMap
                                localities={city.municipalities}
                                polygon_centroid={city.polygon_centroid}
                                endpoint={"freguesia"}
                            />
                            <p className="ssn-subtitle">Navega pelo nosso mapa</p>
                        </Grid>
                        <hr />
                        <AccordionPlots
                            plotVoters={<PlotVoters elections={city.elections} electionYears={electionYears} />}
                            plotAbstention={<PlotAbstentionCity elections={city.elections} />}
                        />
                    </Grid>
                </Grid>
                <hr />
                <Grid item sx={{ ml: 3 }}>
                    <h3>Histórico Eleitoral na Câmara Municipal</h3>
                    <p className="ssn-subtitle">Como variam as votações de cada partido desde 1974?</p>
                </Grid>
                <Grid container item direction="column" sx={{ alignItems: "center", mb: 3 }}>
                    <Grid item size={{ xs: 8, mb: 3 }}>
                        <TableCityHistoric name={city.name} elections={city.elections} endpoint={"cidade"} />
                    </Grid>
                    <Grid item size={{ xs: 10 }} sx={{ mt: 5 }}>
                        <PlotHistory elections={city.elections} />
                    </Grid>
                </Grid>
                <hr />
                <Grid item sx={{ ml: 3 }}>
                    <h2>Panorama Autárquico no Concelho {city.name} em {selectedElectionYear}:</h2>
                    <p className="ssn-subtitle">Quantas Juntas de Freguesia lidera cada partido?</p>
                </Grid>
                <Grid item container direction="row" sx={{ justifyContent: "space-around", alignItems: "center", mr: 1 }}>
                    <Grid item container direction="column" size={{ xs: 12, md: 5 }}>
                        <Grid item size={{ xs: 12 }} sx={{ mt: 3 }}>
                            <PlotNumberCities yAxisLabel={"Número de Juntas de Freguesia"} cities={city.municipalities} electionYears={electionYears} selectedElectionYear={selectedElectionYear} />
                        </Grid>
                        <Grid item size={{ xs: 10 }} sx={{ mx: "auto" }}>
                            {false && <SliderCity electionYears={electionYears} setSelectedElectionYear={setSelectedElectionYear} />}
                        </Grid>
                    </Grid>
                    <Grid item size={{ sx: 12, md: 7 }}>
                        <TableCity municipalities={city.municipalities} selectedElectionYear={selectedElectionYear} />
                    </Grid>
                </Grid>
            </Grid>
        } />
    )
}

export default City
