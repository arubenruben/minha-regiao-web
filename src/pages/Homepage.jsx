import React, { useState, useEffect } from 'react'
import Grid from '@mui/material/Grid';
import Image from 'react-bootstrap/Image';
import logo from '../assets/images/logo.png'
import SubTitleCarousel from '../components/carousel/SubTitleCarousel';
import { sendRequest } from '../utils';
import { Slider } from '@mui/material';
import AutoCompleteHomepage from '../components/autocomplete/AutoCompleteHomepage';
import HomepageMap from '../components/maps/HomepageMap';
import TableHomepage from '../components/table/TableHomepage';
import GenericFooter from '../components/footer/GenericFooter';
import FabChat from '../components/fab/FabChat';
import HomepageLayout from '../layouts/HomepageLayout';
import SliderHomepage from '../components/slider/SliderHomepage';


const Homepage = (props) => {

    const [regions, setRegions] = useState([]);
    const [selectedYear, setSelectedYear] = useState(null)
    const [electionYears, setElectionYears] = useState([]);
    const [electionSummary, setElectionSummary] = useState([]);

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

    const fetchElectionYears = async (name) => {
        const response = await sendRequest(
            `${process.env.REACT_APP_ENDPOINT}/elections/years/`,
            "GET"
        );

        // Sort the election years
        response.sort((a, b) => b - a);

        setElectionYears(response);

        if (response.length > 0) {
            setSelectedYear(response[0]);
            fetchCountryElections(response[0]).catch((error) => {
                console.error('Error fetching country elections:', error);
            });
        }
    }

    const fetchCountryElections = async (year) => {
        const response = await sendRequest(
            `${process.env.REACT_APP_ENDPOINT}/elections/country/${year}`,
            "GET"
        );
        setElectionSummary(response);
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

        fetchElectionYears().catch((error) => {
            console.error('Error fetching election years:', error);
        });

    }, []);

    return (
        <HomepageLayout main={
            <Grid direction="column">
                <Grid container direction="column" sx={{ justifyContent: "center", alignItems: "center", height: "80vh" }} >
                    <Grid container direction="row" size={{ xs: 12 }} sx={{ justifyContent: "center", pb: 3 }}>
                        <Grid container direction="column" size={{ xs: 8.5, md: 3 }} sx={{ alignItems: "center" }}>
                            <Grid item size={12}><h1 id="title">A Minha Região</h1></Grid>
                            <Grid item size={12}><SubTitleCarousel /></Grid>
                        </Grid>
                        <Grid item size={{ xs: 2, md: 3 }} sx={{ justifyContent: "center", alignItems: "center" }}>
                            <Image id="homepage-logo" src={logo} roundedCircle />
                        </Grid>
                    </Grid>
                    <Grid item size={{ xs: 10, md: 6 }}>
                        <AutoCompleteHomepage regions={regions} fetchRegionsById={fetchRegionsById} />
                    </Grid>
                </Grid>
                <hr />
                <Grid item container direction="column" sx={{ mx: 3 }}>
                    <Grid item>
                        <h2>Panorama Autárquico {selectedYear}</h2>
                    </Grid>
                    <Grid item container direction="row">
                        <Grid className="slider-container" item container direction="column" size={{ xs: 12, md: 6 }}>
                            <Grid item>
                                <TableHomepage electionSummary={electionSummary} />
                            </Grid>
                            <Grid item>
                                <SliderHomepage electionYears={electionYears} setSelectedYear={setSelectedYear} fetchCountryElections={fetchCountryElections} />
                            </Grid>
                        </Grid>
                        <Grid item size={{ xs: 12, md: 4 }} sx={{ mx: "auto" }}>
                            <HomepageMap />
                        </Grid>
                    </Grid>
                </Grid>
            </Grid>
        } />
    )
}

export default Homepage