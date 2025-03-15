import React from 'react'
import Grid from '@mui/material/Grid2';
import SelectMunicipality from '../components/select/SelectMunicipality';
//import HomepageMap from '../components/maps/HomepageMap';
import GenericLayout from '../layouts/GenericLayout';

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
                    {/* {<Grid item size={{ xs: 6 }}>
                        <HomepageMap />
                    </Grid>} */}
                    <Grid item size={{ xs: 6 }} sx={{ px: 3 }}>
                        <SelectMunicipality />
                    </Grid>
                </Grid>
            }
        />
    )
}

export default Homepage