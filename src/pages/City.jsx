import React, { useEffect, useState } from 'react'
import { Grid } from '@mui/material';
import { useParams } from 'react-router-dom';
import GenericLayout from '../layouts/GenericLayout';
import { sendRequest } from '../utils';
import LocalMap from '../components/maps/LocalMap';
import CardWikipedia from '../components/card/CardWikipedia';
import PlotVoters from '../components/plot/PlotVoters';
import TableCity from '../components/table/TableCity';
import TableCityHistoric from '../components/table/TableCityHistoric';
import CarouselPresidents from '../components/carousel/CarouselPresidents';


const City = (props) => {
    const [city, setCity] = useState(null);

    const { name } = useParams();

    console.log(name);

    const fetchCity = async (name) => {
        const response = await sendRequest(
            `${process.env.REACT_APP_ENDPOINT}/cities/${name.trim()}`,
            "GET"
        );

        setCity(response);
    }

    useEffect(() => {
        fetchCity(name);

    }, []);


    return (
        <GenericLayout main={
            <Grid container direction="column">
                <Grid item>
                    <h1>Cidade: {city?.name}</h1>
                </Grid>
                <Grid item container direction="row" sx={{ justifyContent: "space-around", mb: 5 }}>
                    <Grid item container direction="column" sx={{ alignItems: "center" }} size={{ xs: 6 }}>
                        <Grid item>
                            <CardWikipedia wikipedia={city?.wikipedia} />
                        </Grid>
                        <Grid item>
                            <PlotVoters name={city?.name} elections={city?.elections} />
                        </Grid>
                    </Grid>
                    <Grid item size={{ xs: 5 }} >
                        <LocalMap />
                    </Grid>
                </Grid>
                <hr />
                <Grid item>
                    <h3>Histórico na Câmara Municipal</h3>
                </Grid>
                <Grid item>
                    <TableCityHistoric />
                </Grid>
                <Grid item>
                    <h4>Os Presidentes:</h4>
                </Grid>
                <Grid item>
                    <CarouselPresidents />
                </Grid>
                <hr />
                <Grid item>
                    <h3>Histórico Autárquico no Munícipio</h3>
                </Grid>
                <Grid item>
                    <TableCity elections={city?.elections} />
                </Grid>

            </Grid>
        } />
    )
}

export default City