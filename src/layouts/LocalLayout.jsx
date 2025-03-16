import React from 'react'
import Grid from '@mui/material/Grid2';
import { Divider } from '@mui/material';
import PlotElection from '../components/plot/PlotElection';
import CardElection from '../components/card/CardElection';
import LocalMap from '../components/maps/LocalMap';
import GenericLayout from './GenericLayout';
import PlotAverage from '../components/plot/PlotAverage';

const LocalLayout = (props) => {
    return (
        <GenericLayout
            main={
                <Grid container direction={'column'}>
                    <Grid item sx={{ mb: 5 }}>
                        <h1>{props.name}</h1>
                    </Grid>
                    <Grid container direction={'row'}>
                        <Grid container direction={'column'} sx={{ mb: 5 }} size={{ xs: 6 }}>
                            <Grid item>
                                <h3>{props.geographyTitle}</h3>
                                {props.formGeography}
                            </Grid>
                            <Divider />
                            <Grid item>
                                <h3>{props.contactsTitle}</h3>
                                {props.formContacts}
                            </Grid>
                            <Divider />
                            <Grid item>
                                <h3>{props.usefullLinksTitle}</h3>
                                {props.formUsefullLinks}
                            </Grid>
                        </Grid>
                        <Grid item size={{ xs: 6 }}>
                            <LocalMap />
                        </Grid>
                    </Grid>
                    <Grid item container direction={'column'} sx={{ mb: 5 }}>
                        <Grid item>
                            <h2>Histórico de Eleições Autárquicas</h2>
                        </Grid>
                        <Grid item container direction={'row'} justifyContent={'space-between'}>
                            <PlotElection elections={props.elections} />
                        </Grid>
                    </Grid>
                    <Grid item container direction={'row'} sx={{ mb: 5 }}>
                        {props.elections?.map((election, index) => <CardElection key={index} election={election} />)}
                    </Grid>
                    {props.averageElections && <>
                        <Divider />
                        <Grid item>
                            <PlotAverage elections={props.averageElections} />
                        </Grid>
                    </>}
                </Grid>
            }
        />
    )
}

export default LocalLayout