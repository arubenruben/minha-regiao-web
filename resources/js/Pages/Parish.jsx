import React from 'react'
import { Link } from '@inertiajs/react'
import GenericLayout from '@/Layouts/GenericLayout'
import Grid from '@mui/material/Grid';
import Breadcrumbs from '@mui/material/Breadcrumbs';
import Alert from 'react-bootstrap/Alert';
import ParishMap from '@/Components/Maps/ParishMap';
import AccordionWikipedia from '@/Components/Accordion/AccordionWikipedia';
import AccordionPlots from '@/Components/Accordion/AccordionPlots';
import PlotVoters from '@/Components/Plots/PlotVoters';
import PlotAbstentionCity from '@/Components/Plots/PlotAbstentionLocal';
import PlotHistory from '@/Components/Plots/PlotHistory';
import TableElectionHistoric from '@/Components/Tables/TableElectionHistoric';
import Container from '@mui/material/Container';

const Parish = ({ parish }) => {

    const breadCrumbs = [
        <Link key="1" href="/">
            Ínicio
        </Link>,
        <Link key="2" href={route('districts.show', { district: parish.district.freguesia_pt_entry.name })}>
            {parish.district.freguesia_pt_entry.name}
        </Link>,
        <Link key="3" href={route('cities.show', { city: parish.city.freguesia_pt_entry.name })}>
            {parish.city.freguesia_pt_entry.name}
        </Link>,
        <span key="4">{parish.name}</span>
    ]

    return (
        <Container>

            <GenericLayout
                main={
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
                                <ParishMap parish={parish} />
                                <p className="ssn-subtitle">Navega pelo nosso mapa</p>
                            </Grid>
                            <Grid item container direction="column" size={{ xs: 12, md: 7 }}>
                                <Grid item>
                                    <AccordionWikipedia name={parish.name} wikipedia={parish.wikipedia} />
                                </Grid>
                                <Grid item sx={{ mt: { xs: 3 }, display: { xs: "block", md: "none" } }}>
                                    <ParishMap
                                        parish={parish}
                                    />
                                    <p className="ssn-subtitle">Navega pelo nosso mapa</p>
                                </Grid>
                                <hr />
                                <AccordionPlots
                                    plotVoters={<PlotVoters locations={[parish]} />}
                                    plotAbstention={<PlotAbstentionCity elections={parish.elections} />}
                                />
                            </Grid>
                        </Grid>
                        <hr />
                        <Grid item>
                            <h3>Histórico na Junta de Freguesia</h3>
                        </Grid>
                        <Grid container item direction="column" sx={{ alignItems: "center" }}>
                            <Grid item size={{ xs:12, md: 10 }} sx={{ my: 3 }}>
                                <PlotHistory elections={parish.elections} />
                            </Grid>
                            <Grid item size={{ xs: 12, md: 8 }}>
                                <TableElectionHistoric elections={parish.elections} />
                            </Grid>
                        </Grid>
                    </Grid >
                }
            />
        </Container>
    )
}

export default Parish
