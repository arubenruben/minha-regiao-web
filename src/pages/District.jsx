import React, { useEffect, useState } from 'react'
import { useParams } from 'react-router-dom';
import { _constructElections, sendRequest } from '../utils';
import GenericLayout from '../layouts/GenericLayout';
import Grid from '@mui/material/Grid';
import LocalMap from '../components/maps/LocalMap';
import PlotNumberCities from '../components/plot/PlotNumberCities';
import TableDistrict from '../components/table/TableDistrict';
import SliderDistrict from '../components/slider/SliderDistrict';
import PlotVotersDistrict from '../components/plot/PlotVotersDistrict';
import AccordionWikipedia from '../components/accordion/AccordionWikipedia';
import { Link } from 'react-router-dom';
import NorthWestIcon from '@mui/icons-material/NorthWest';

const District = (props) => {

    const { name } = useParams();
    const [district, setDistrict] = useState(null);
    const [electionYears, setElectionYears] = useState([]);
    const [selectedElectionYear, setSelectedElectionYear] = useState(null);

    const fetchElectionYears = async (name) => {
        const response = await sendRequest(
            `${process.env.REACT_APP_ENDPOINT}/elections/years/`,
            "GET"
        );

        setElectionYears(response);
    }

    // Fetch districts from the API
    const fetchDistrict = async (name) => {
        const response = await sendRequest(
            `${process.env.REACT_APP_ENDPOINT}/districts/${name.trim()}`,
            "GET"
        );

        setDistrict(response);
    };


    useEffect(() => {
        fetchDistrict(name).catch((error) => {
            console.error('Error fetching district:', error);
        });

        fetchElectionYears(name).catch((error) => {
            console.error('Error fetching election years:', error);
        });
    }, []);

    return (
        <GenericLayout
            main={
                <Grid container direction="column" >
                    <Grid item container direction="row" sx={{ alignItems: "center", mt: 2, ml: 2 }}>
                        <Grid item>
                            <span>
                                <NorthWestIcon sx={{ fontSize: 20 }} />
                                <Link to={`/`}>
                                    Voltar à Página Principal
                                </Link>
                            </span>
                        </Grid>
                    </Grid>
                    <Grid item container direction="row" sx={{ mt: 3, justifyContent: "space-around", ml: 3 }}>
                        <Grid item size={{ xs: 0, md: 4 }} >
                            <LocalMap
                                localities={district?.cities}
                                polygon_centroid={district?.polygon_centroid}
                                endpoint={"cidade"}
                            />
                            <p className="ssn-subtitle">Navega pelo nosso mapa</p>
                        </Grid>
                        <Grid item container direction="column" size={{ xs: 12, md: 7 }}>
                            <Grid item>
                                <AccordionWikipedia name={`Distrito ${district?.name}`} wikipedia={district?.wikipedia} />
                            </Grid>
                            <hr />
                            <Grid item sx={{ mt: 2 }}>
                                <h4>Número de Eleitores Registados no Distrito</h4>
                                <p className="ssn-subtitle">Como variou o número de eleitores desde 1974?</p>
                            </Grid>
                            <Grid item sx={{ alignItems: { md: "center" } }}>
                                <PlotVotersDistrict cities={district?.cities} electionYears={electionYears} />
                            </Grid>
                        </Grid>
                        {/* Map only for the smaller screens */}
                        <Grid item size={{ xs: 12, md: 0 }} >
                            <LocalMap />
                        </Grid>
                    </Grid>
                    <hr />
                    <Grid item sx={{ ml: 3 }}>
                        <h3>Panorama Autárquico no Distrito {district?.name} em {selectedElectionYear}:</h3>
                        <p className="ssn-subtitle">Quantas Câmaras Municipais lidera cada partido?</p>
                    </Grid>
                    <Grid item container direction="row" sx={{ justifyContent: "space-around", mr: 1 }}>
                        <Grid item container direction="column" size={{ xs: 12, md: 5 }}>
                            <Grid item size={{ xs: 12 }} sx={{ mt: 3 }}>
                                <PlotNumberCities yAxisLabel={"Número de Câmaras Municipais"} cities={district?.cities} electionYears={electionYears} selectedElectionYear={selectedElectionYear} />
                            </Grid>
                            <Grid item size={{ xs: 10 }} sx={{ mx: "auto" }}>
                                <SliderDistrict electionYears={electionYears} setSelectedElectionYear={setSelectedElectionYear} />
                            </Grid>
                        </Grid>
                        <Grid item size={{ sx: 12, md: 7 }}>
                            <TableDistrict cities={district?.cities} selectedElectionYear={selectedElectionYear} />
                        </Grid>
                    </Grid>
                </Grid>
            }
        />
    )
}

export default District