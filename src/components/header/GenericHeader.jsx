import { Button } from '@mui/material';
import React from 'react'
import { Link } from "react-router";

const GenericHeader = (props) => {
    return (
        <header>
            Isto é um header genérico
            <Link to="/">
                <Button variant="contained" color="primary">
                    Home
                </Button>
            </Link>
        </header>
    )
}

export default GenericHeader