import React from 'react'
import Grid from '@mui/material/Grid2';
import SelectMunicipality from '../components/select/SelectMunicipality';
//import HomepageMap from '../components/maps/HomepageMap';
import GenericLayout from '../layouts/GenericLayout';
import HomepageMap from '../components/maps/HomepageMap';

const Homepage = (props) => {
    return (
        <GenericLayout
            main={
                <Grid container direction={"row"} sx={{
                    mt: 10,
                    mx: 5,
                    justifyContent: "center",
                    alignItems: "center",
                }}>
                    <Grid container item size={{ xs: 6 }} direction={"column"}>
                        <Grid item>
                            <h1>Escolha a tua localidade</h1>
                        </Grid>
                        <Grid item>
                            <HomepageMap />
                        </Grid>
                    </Grid>
                    <Grid item size={{ xs: 6 }} sx={{ px: 3 }}>
                        <SelectMunicipality />
                    </Grid>
                </Grid>
            }
        />
    )
}

export default Homepage