import React from 'react'
import { Grid } from '@mui/material'

const GenericFooter = () => {
    return (
        <Grid container direction={"row"} sx={{ alignContent: "center", py: 1, px: 2 }}>
            <Grid item>
                Todos os Direitos Reservados &copy; {new Date().getFullYear()} - A Minha Região
            </Grid>
        </Grid>
    )
}

export default GenericFooter
