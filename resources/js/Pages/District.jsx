import React, { useState, useMemo } from 'react'
import Grid from '@mui/material/Grid';
import { Link } from '@inertiajs/react'
import GenericLayout from '@/Layouts/GenericLayout';
import Breadcrumbs from '@mui/material/Breadcrumbs';
import LocalMap from '@/Components/Maps/LocalMap';
import AccordionWikipedia from '@/Components/Accordion/AccordionWikipedia';
import AccordionPlots from '@/Components/Accordion/AccordionPlots';
import PlotAbstention from '@/Components/Plots/PlotAbstention';
import TableLocalities from '@/Components/Tables/TableLocalities';
import PlotVoters from '@/Components/Plots/PlotVoters';
import PlotNumberCities from '@/Components/Plots/PlotWinningParties';
import SliderLocal from '@/Components/Sliders/SliderDistrict';

const District = ({ district }) => {
    const [selectedElectionYear, setSelectedElectionYear] = useState(null);

    const electionYears = useMemo(() => {
        const yearSet = new Set();
        district.cities.forEach(city => {
            city.elections.forEach(election => {
                yearSet.add(election.year);
            });
        });
        return Array.from(yearSet).sort((a, b) => a - b);
    }, [district.cities]);

    const breadCrumbs = [
        <Link key="1" href={route("home")}>
            Início
        </Link>,
        <Link key="2" href={route("districts.show", { district: district.name })}>
            {district.name}
        </Link>,
        <span key="3">{district.name}</span>
    ]

    return (
        <GenericLayout main={
            <Grid container direction="column" >
                <Grid item container direction="row" sx={{ alignItems: "center", mt: 2, ml: 2 }}>
                    <Grid item>
                        <Breadcrumbs separator=">" sx={{ mb: 2 }}>
                            {breadCrumbs}
                        </Breadcrumbs>
                    </Grid>
                </Grid>
                <Grid item container direction="row" sx={{ mt: 3, justifyContent: "space-around", ml: { md: 3 } }}>
                    <Grid item size={{ xs: 0, md: 4 }} sx={{ display: { xs: "none", md: "block" } }}>
                        <LocalMap
                            localities={district.cities}
                            polygon_centroid={district.polygon_centroid}
                            endpoint={"cidade"}
                        />
                        <p className="ssn-subtitle">Navega pelo nosso mapa</p>
                    </Grid>
                    <Grid item container direction="column" size={{ xs: 12, md: 7 }}>
                        <Grid item>
                            <AccordionWikipedia name={`Distrito ${district.name}`} wikipedia={district.wikipedia} />
                        </Grid>
                        <Grid item sx={{ mt: { xs: 3 }, display: { xs: "block", md: "none" } }}>
                            <LocalMap
                                localities={district.cities}
                                polygon_centroid={district.polygon_centroid}
                                endpoint={"cidade"}
                            />
                            <p className="ssn-subtitle">Navega pelo nosso mapa</p>
                        </Grid>
                        <hr />
                        <AccordionPlots
                            plotVoters={<PlotVoters locations={district.cities} />}
                            plotAbstention={<PlotAbstention locations={district.cities} electionYears={electionYears} />}
                        />
                    </Grid>
                    {/* Map only for the smaller screens */}
                    <Grid item size={{ xs: 12, md: 0 }} >
                        <LocalMap />
                    </Grid>
                </Grid>
                <hr />
                <Grid item sx={{ ml: 3 }}>
                    <h3>Panorama Autárquico no Distrito {district.name} em {selectedElectionYear}:</h3>
                    <p className="ssn-subtitle">Quantas Câmaras Municipais lidera cada partido?</p>
                </Grid>
                <Grid item container direction="row" sx={{ justifyContent: "space-around", mr: 1 }}>
                    <Grid item container direction="column" size={{ xs: 12, md: 5 }}>
                        <Grid item size={{ xs: 12 }} sx={{ mt: 3 }}>
                            <PlotNumberCities
                                yAxisLabel={"Número de Câmaras Municipais"}
                                locations={district.cities}
                                selectedElectionYear={selectedElectionYear} />
                        </Grid>
                        <Grid item size={{ xs: 10 }} sx={{ mx: "auto" }}>
                            <SliderLocal
                                electionYears={electionYears}
                                selectedElectionYear={selectedElectionYear}
                                setSelectedElectionYear={setSelectedElectionYear} />
                        </Grid>
                    </Grid>
                    <Grid item size={{ sx: 12, md: 7 }}>
                        <TableLocalities localities={district.cities} selectedElectionYear={selectedElectionYear} />
                    </Grid>
                </Grid>
            </Grid>
        } />

    )
}

export default District
