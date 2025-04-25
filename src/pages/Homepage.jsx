import React, { useState, useEffect } from 'react'
import Grid from '@mui/material/Grid';
import Image from 'react-bootstrap/Image';
import logo from '../assets/images/logo.png'
import Autocomplete from '@mui/material/Autocomplete';
import SubTitleCarousel from '../components/carousel/SubTitleCarousel';
import { TextField } from '@mui/material';
import { Divider } from '@mui/material';
import { sendRequest } from '../utils';
import { Link, useNavigate } from 'react-router-dom';
import AutoCompleteHomepage from '../components/autocomplete/AutoCompleteHomepage';
import HomepageMap from '../components/maps/HomepageMap';
import TableHomepage from '../components/table/TableHomepage';

const Homepage = (props) => {

    const [regions, setRegions] = useState([]);
    const [selectedYear, setSelectedYear] = useState(null)


    // Fetch regions from the API
    const fetchRegions = async () => {
        const params = new URLSearchParams({
            new_municipalities: true
        });

        const response = await sendRequest(
            `${process.env.REACT_APP_ENDPOINT}/freguesias_pt_entries?${params.toString()}`,
            "GET"
        );
        setRegions(response);
    };

    const fetchRegionsById = async (id) => {
        return await sendRequest(
            `${process.env.REACT_APP_ENDPOINT}/freguesias_pt_entries/${id}`,
            "GET"
        );
    }

    useEffect(() => {
        fetchRegions().catch((error) => {
            console.error('Error fetching regions:', error);
        });

        // Sort by type. First "Distrito", then "Concelho", then "Freguesia"
        setRegions((prevRegions) => {
            return prevRegions.sort((a, b) => {
                const typeOrder = {
                    "Distrito": 1,
                    "Concelho": 2,
                    "Freguesia": 3
                };
                return (typeOrder[a.type] || 4) - (typeOrder[b.type] || 4);
            });
        });
    }, []);

    return (
        <Grid>
            <Grid container direction="column" sx={{ justifyContent: "center", alignItems: "center", height: "80vh" }} >
                <Grid container direction="row" size={{ xs: 12 }} sx={{ justifyContent: "center", pb: 3 }}>
                    <Grid container direction="column" size={{ xs: 3 }} sx={{ justifyContent: "center", alignItems: "center" }}>
                        <Grid item size={{ xs: 12 }}><h1 id="title">A Minha Região</h1></Grid>
                        <Grid item size={{ xs: 12 }}><SubTitleCarousel /></Grid>
                    </Grid>
                    <Grid item>
                        <Image id="homepage-logo" src={logo} roundedCircle />
                    </Grid>
                </Grid>
                <Grid item size={6}>
                    <AutoCompleteHomepage regions={regions} fetchRegionsById={fetchRegionsById} />
                </Grid>
            </Grid>
            <hr />
            <Grid item container direction="column" sx={{ mx: 3 }}>
                <Grid item>
                    <h2>Panorama Autárquico {selectedYear}</h2>
                </Grid>
                <Grid item container direction="row">
                    <Grid item size={{ xs: 6 }}>
                        <TableHomepage />
                    </Grid>
                    <Grid item size={{ xs: 4 }} sx={{ mx: "auto" }}>
                        <HomepageMap />
                    </Grid>
                </Grid>
            </Grid>

        </Grid>
    )
}

export default Homepage