import GenericLayout from '@/Layouts/GenericLayout'
import React from 'react'
import { Grid, Breadcrumbs } from '@mui/material'
import { Link } from '@inertiajs/react'
import PlotElection from '@/Components/Plots/PlotElection'
import TableElectionMetadata from '@/Components/Tables/TableElectionMetadata'
import SliderElection from '@/Components/Sliders/SliderElection'

const Election = ({ year, name }) => {
    const [election, setElection] = useState(null);
    const [electionToCompare, setElectionToCompare] = useState(null);

    const breadCrumbs = [
        <Link key="1" to="/">
            Ínicio
        </Link>,
        <Link key="2" to={`/${type}/${name}`}>{name}</Link>,
        <span key="3">Eleições</span>,
        <span key="4">{year}</span>
    ]

    return (
        <GenericLayout
            main={
                <Grid container direction="column" sx={{ mx: 5, mt: 3 }}>
                    <Grid item container direction="row" sx={{ alignItems: "center", mt: 2 }}>
                        <Grid item>
                            <Breadcrumbs separator=">" sx={{ mb: 2 }}>
                                {breadCrumbs}
                            </Breadcrumbs>
                        </Grid>
                    </Grid>
                    <Grid item>
                        <h2>Eleição de {year} em {name}</h2>
                        <p className="ssn-subtitle">Compara os resultados dos partidos</p>
                    </Grid>
                    <Grid item container direction="row" sx={{ mt: 5, justifyContent: "space-around" }}>
                        <Grid item container direction="column" size={{ xs: 12, md: 7 }}>
                            <Grid item>
                                <PlotElection
                                    election={election}
                                    name={name}
                                    type={type}
                                    yearToCompare={yearToCompare}
                                    year={year}
                                    electionToCompare={electionToCompare}
                                    setElectionToCompare={setElectionToCompare}
                                />
                                {electionYears && <SliderElection electionYears={electionYears} setYearToCompare={setYearToCompare} />}
                            </Grid>
                        </Grid>
                        <Grid item size={{ xs: 12, md: 4.5 }} >
                            <TableElectionMetadata election={election} electionToCompare={electionToCompare} year={year} yearToCompare={yearToCompare} />
                        </Grid>
                    </Grid>
                    <hr />
                    <Grid item>
                        <h3>As notícias locais em {name} sobre a Eleição de {year}</h3>
                        <p className="ssn-subtitle">Quais os temas falados nos jornais locais da região no período eleitoral?</p>
                    </Grid>
                    <Grid item container direction="row" sx={{ mt: 5 }} spacing={4}>
                        <p>Brevemente Disponível</p>
                    </Grid>
                </Grid>
            }
        />
    )
}

export default Election
