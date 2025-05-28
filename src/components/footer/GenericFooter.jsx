import { Grid } from '@mui/material'
import React from 'react'
import { Link } from 'react-router-dom'

const GenericFooter = (props) => {
    return (
        <footer>
            <Grid container direction={"row"} sx={{ alignContent: "center", py: 1, px: 2 }}>
                <Grid item>
                    Todos os Direitos Reservados &copy; {new Date().getFullYear()} - A Minha Região
                </Grid>                
            </Grid>
        </footer>
    )
}

export default GenericFooter