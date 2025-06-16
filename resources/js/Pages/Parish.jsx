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
import PlotAbstentionCity from '@/Components/Plots/PlotAbstentionCity';
import PlotHistory from '@/Components/Plots/PlotHistory';
import TableCityHistoric from '@/Components/Tables/TableCityHistoric';

const Parish = ({ parish }) => {

    const breadCrumbs = [
        <Link key="1" href="/">
            Ínicio
        </Link>,
        <Link key="2" href={`/distrito/${parish?.district_name}`}>
            {parish?.district_name}
        </Link>,
        <Link key="3" href={`/cidade/${parish?.city_name}`}>
            {parish?.city_name}
        </Link>,
        <span key="4">{parish?.name}</span>
    ]

    return (
        <GenericLayout
            alert={
                <>
                    {parish?.new_parish ? <Alert variant="warning" style={{ margin: "10px" }} >
                        <Alert.Heading>Freguesia Extinta na Reorganização administrativa do território (Lei n.º 22/2012, de 30 de maio)</Alert.Heading>
                        <p>Nova Designação: <Link to={`/freguesia/${parish.new_parish.id}`}> {parish.new_parish.name}</Link></p>
                    </Alert > : null}
                    {
                        parish?.old_municipalities?.length > 0 ? <Alert variant="warning" style={{ margin: "10px" }} >
                            <Alert.Heading>Freguesia resultante da fusão de freguesias</Alert.Heading>
                            <p>Freguesia resultante da fusão de freguesias:
                                {parish?.old_municipalities?.map((old_parish, index) => {
                                    return (
                                        <Link key={index} to={`/freguesia/${old_parish.id}`}> {old_parish.name}</Link>
                                    )
                                })}
                            </p>
                        </Alert > : null
                    }
                </>
            }
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
                                <AccordionWikipedia name={parish?.name} wikipedia={parish?.wikipedia} />
                            </Grid>
                            <Grid item sx={{ mt: { xs: 3 }, display: { xs: "block", md: "none" } }}>
                                <ParishMap
                                    parish={parish}
                                />
                                <p className="ssn-subtitle">Navega pelo nosso mapa</p>
                            </Grid>
                            <hr />
                            <AccordionPlots
                                plotVoters={<PlotVoters elections={parish?.elections} />}
                                plotAbstention={<PlotAbstentionCity elections={parish?.elections} />}
                            />
                        </Grid>
                    </Grid>
                    <hr />
                    <Grid item>
                        <h3>Histórico na Junta de Freguesia</h3>
                    </Grid>
                    <Grid container item direction="column" sx={{ alignItems: "center" }}>
                        <Grid item size={{ xs: 10 }} sx={{ my: 3 }}>
                            <PlotHistory elections={parish?.elections} />
                        </Grid>
                        <Grid item size={{ xs: 8 }}>
                            <TableCityHistoric name={parish?.name} elections={parish?.elections} endpoint={"freguesia"} />
                        </Grid>
                    </Grid>
                </Grid >
            }
        />
    )
}

export default Parish
