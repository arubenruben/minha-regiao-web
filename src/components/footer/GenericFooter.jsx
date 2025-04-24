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
                <Grid>
                    <Link to="/privacy-policy" style={{ textDecoration: "none", color: "inherit" }}>
                        <Grid item sx={{ pl: 2 }}>
                            Política de Privacidade
                        </Grid>
                    </Link>
                </Grid>
                <Grid>
                    <Link to="/terms-of-use" style={{ textDecoration: "none", color: "inherit" }}>
                        <Grid item sx={{ pl: 2 }}>
                            Termos de Uso
                        </Grid>
                    </Link>
                </Grid>
                <Grid>
                    <Link to="/cookies-policy" style={{ textDecoration: "none", color: "inherit" }}>
                        <Grid item sx={{ pl: 2 }}>
                            Política de Cookies
                        </Grid>
                    </Link>
                </Grid>
                <Grid>
                    <Link to="/contact" style={{ textDecoration: "none", color: "inherit" }}>
                        <Grid item sx={{ pl: 2 }}>
                            Contacto
                        </Grid>
                    </Link>
                </Grid>
                <Grid>
                    <Link to="/about" style={{ textDecoration: "none", color: "inherit" }}>
                        <Grid item sx={{ pl: 2 }}>
                            Sobre Nós
                        </Grid>
                    </Link>
                </Grid>
            </Grid>
        </footer>
    )
}

export default GenericFooter