import React, { useState, useEffect } from 'react'
import Grid from '@mui/material/Grid2';
import GenericLayout from '../layouts/GenericLayout'
import Divider from '@mui/material/Divider';
import President from '../components/thumbnails/President';

const City = (props) => {

  return (
    <GenericLayout
      main={
        <Grid container direction={"column"}>
          <Grid item>
            <h1>Matosinhos</h1>
          </Grid>
          <Grid container direction={"row"}>
            <Grid item size={{ xs: 6 }}>
              Mapa
            </Grid>
            <Grid item size={{ xs: 6 }}>
              Informação
            </Grid>
          </Grid>
          <Divider />
          <Grid container direction={"row"}>
            <Grid size={{ xs: 2 }}>
              <President alt={"Luísa Salgueiro"} />
            </Grid>
          </Grid>
          <Divider />
          <Grid item>
          </Grid>
        </Grid>
      }
    />
  )
}

export default City
