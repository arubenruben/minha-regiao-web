import React, { useState, useMemo } from 'react'
import GenericLayout from '@/Layouts/GenericLayout'
import { Link } from '@inertiajs/react'
import Grid from '@mui/material/Grid';
import Breadcrumbs from '@mui/material/Breadcrumbs';
import LocalMap from '@/Components/Maps/LocalMap';
import AccordionWikipedia from '@/Components/Accordion/AccordionWikipedia';
import AccordionPlots from '@/Components/Accordion/AccordionPlots';
import PlotVoters from '@/Components/Plots/PlotVoters';
import PlotHistory from '@/Components/Plots/PlotHistory';
import TableElectionHistoric from '@/Components/Tables/TableElectionHistoric';
import PlotWinningParties from '@/Components/Plots/PlotWinningParties';
import PlotAbstention from '@/Components/Plots/PlotAbstention';
import SliderLocal from '@/Components/Sliders/SliderYears';
import TableLocalities from '@/Components/Tables/TableLocalities';
import Container from '@mui/material/Container';


const City = ({ city }) => {
    const [selectedElectionYear, setSelectedElectionYear] = useState(null);

    const electionYears = useMemo(() => {
        const yearSet = new Set();
        city.elections.forEach(election => {
            yearSet.add(election.year);
        });
        return Array.from(yearSet).sort((a, b) => a - b);
    }, [city]);

    const breadCrumbs = [
        <Link key="1" href={route("home")}>
            Início
        </Link>,
        <Link key="2" href={route("districts.show", { district: city.district.freguesia_pt_entry.name })}>
            {city.district.freguesia_pt_entry.name}
        </Link>,
        <span key="3">{city.name}</span>
    ]

    return (
        <GenericLayout main={
            <Container>
                <Grid container direction="column">
                    <Grid item container direction="row" sx={{ alignItems: "center", mt: 2 }}>
                        <Grid item>
                            <Breadcrumbs separator=">" sx={{ mb: 2 }}>
                                {breadCrumbs}
                            </Breadcrumbs>
                        </Grid>
                    </Grid>
                    <Grid item container direction="row">
                        <Grid item size={{ md: 4 }} sx={{ display: { xs: "none", md: "block" } }}>
                            <LocalMap
                                localities={city.parishes}
                                polygon_centroid={city.polygon_centroid}
                                endpoint={"freguesia"} />
                            <p className="ssn-subtitle">Navega pelo nosso mapa</p>
                        </Grid>
                        <Grid item container direction="column" size={{ xs: 12, md: 7 }} sx={{ mt: { xs: 1, md: 0 } }}>
                            <Grid item>
                                <AccordionWikipedia name={`Cidade ${city.name}`} wikipedia={city.wikipedia} />
                            </Grid>
                            <Grid item sx={{ mt: { xs: 3 }, display: { xs: "block", md: "none" } }}>
                                <LocalMap
                                    localities={city.parishes}
                                    polygon_centroid={city.polygon_centroid}
                                    endpoint={"freguesia"}
                                />
                                <p className="ssn-subtitle">Navega pelo nosso mapa</p>
                            </Grid>
                            <hr />
                            <AccordionPlots
                                plotVoters={<PlotVoters locations={[city]} />}
                                plotAbstention={<PlotAbstention locations={[city]} />}
                            />
                        </Grid>
                    </Grid>
                    <hr />
                    <Grid item>
                        <h3>Histórico Eleitoral na Câmara Municipal</h3>
                        <p className="ssn-subtitle">Como variam as votações de cada partido desde 1974?</p>
                    </Grid>
                    <Grid container item direction="column" sx={{ alignItems: "center", mb: 3 }}>
                        <Grid item size={{ xs: 12, md: 7 }}>
                            <TableElectionHistoric elections={city.elections} />
                        </Grid>
                        <Grid item size={{ xs: 12, md: 10 }} sx={{ mt: 5 }}>
                            <PlotHistory elections={city.elections} />
                        </Grid>
                    </Grid>
                    <hr />
                    <Grid item>
                        <h2>Panorama Autárquico no Concelho {city.name} em {selectedElectionYear}:</h2>
                        <p className="ssn-subtitle">Quantas Juntas de Freguesia lidera cada partido?</p>
                    </Grid>
                    <Grid item container direction="row" sx={{ justifyContent: "space-around", alignItems: "center", mr: 1 }}>
                        <Grid item container direction="column" size={{ xs: 12, md: 5 }}>
                            <Grid item size={{ xs: 12 }} sx={{ mt: 3 }}>
                                <PlotWinningParties yAxisLabel={"Número de Juntas de Freguesia"} locations={city.parishes} selectedElectionYear={selectedElectionYear} />
                            </Grid>
                            <Grid item size={{ xs: 10 }} sx={{ mx: "auto" }}>
                                <SliderLocal electionYears={electionYears} selectedElectionYear={selectedElectionYear} setSelectedElectionYear={setSelectedElectionYear} />
                            </Grid>
                        </Grid>
                        <Grid item size={{ sx: 12, md: 7 }}>
                            <TableLocalities
                                localities={city.parishes}
                                type={"parish"}
                                selectedElectionYear={selectedElectionYear} />
                        </Grid>
                    </Grid>
                </Grid>
            </Container>
        } />
    )
}

export default City
