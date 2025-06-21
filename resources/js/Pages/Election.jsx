import GenericLayout from '@/Layouts/GenericLayout'
import React, { useMemo } from 'react'
import { Grid, Breadcrumbs } from '@mui/material'
import { Link } from '@inertiajs/react'
import PlotElection from '@/Components/Plots/PlotElection'
import TableElectionMetadata from '@/Components/Tables/TableElectionMetadata'
import SliderElection from '@/Components/Sliders/SliderElection'
import Container from '@mui/material/Container'

const Election = ({ election }) => {

    const [yearToCompare, setYearToCompare] = React.useState(null);

    const breadCrumbs = useMemo(() => {
        const breadCrumbs = [];

        breadCrumbs.push(
            <Link key="1" href={route("home")}>
                Início
            </Link>
        );

        if (election.district) {
            breadCrumbs.push(
                <Link key="2" href={route("districts.show", { district: election.district.name })}>
                    {election.district.name}
                </Link>
            );
        }
        if (election.city) {
            breadCrumbs.push(
                <Link key="3" href={route("cities.show", { city: election.city.name })}>
                    {election.city.name}
                </Link>
            );
        }
        if (election.parish) {
            breadCrumbs.push(
                <Link key="4" href={route("parishes.show", { parish: election.parish.name })}>
                    {election.parish.name}
                </Link>
            );
        }

        breadCrumbs.push(
            <span key="5">Eleição de {election.year}</span>
        )

        return breadCrumbs;
    }, [election]);

    const name = useMemo(() => {
        if (election.parish) {
            return election.parish.name;
        }
        if (election.city) {
            return election.city.name;
        }
        if (election.district) {
            return election.district.name;
        }
        return "";
    }, [election]);


    return (
        <GenericLayout
            main={
                <Container>
                    <Grid container direction="column" sx={{ mt: 3 }}>
                        <Grid item container direction="row" sx={{ alignItems: "center", mt: 2 }}>
                            <Grid item>
                                <Breadcrumbs separator=">" sx={{ mb: 2 }}>
                                    {breadCrumbs}
                                </Breadcrumbs>
                            </Grid>
                        </Grid>
                        <h2>Eleição de {election.year} em {name}</h2>
                        <p className="ssn-subtitle">Compara os resultados dos partidos</p>
                    </Grid>
                    <Grid item container direction="row" sx={{ mt: { sm: 3, md: 5 }, justifyContent: "space-around" }}>
                        <Grid item container direction="column" size={{ xs: 12, md: 7 }} >
                            <Grid item>
                                <PlotElection
                                    election={election}
                                    yearToCompare={yearToCompare}
                                />
                            </Grid>
                            <Grid item>
                                <SliderElection elections={election.other_elections} setSelectedElectionYear={setYearToCompare} />
                            </Grid>
                        </Grid>
                        <Grid item>
                            <Grid item size={{ xs: 12, md: 4.5 }} sx={{ display: { xs: "none", md: "block" } }}>
                                <TableElectionMetadata election={election} yearToCompare={yearToCompare} />
                            </Grid>
                        </Grid>
                        <hr />
                        <Grid item sx={{ mt: { xs: 1, md: 0 } }}>
                            <h3>As notícias locais em {name} sobre a Eleição de {election.year}</h3>
                            <p className="ssn-subtitle">Quais os temas falados nos jornais locais da região no período eleitoral?</p>
                        </Grid>
                        <Grid item container direction="row" sx={{ mt: 5 }} spacing={4}>
                            <p>Brevemente Disponível</p>
                        </Grid>
                    </Grid>
                </Container >
            }
        />
    )
}

export default Election
