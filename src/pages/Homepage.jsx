import React, { useState, useEffect } from 'react'
import Grid from '@mui/material/Grid';
import Image from 'react-bootstrap/Image';
import logo from '../assets/images/logo.png'
import { sendRequest } from '../utils';
import AutoCompleteHomepage from '../components/autocomplete/AutoCompleteHomepage';
import HomepageMap from '../components/maps/HomepageMap';
import HomepageLayout from '../layouts/HomepageLayout';
import SliderHomepage from '../components/slider/SliderHomepage';
import PlotHomepage from '../components/plot/PlotHomepage';
import FabChat from '../components/fab/FabChat';
import Chat from '../components/chat/Chat';
import { createChatBotMessage } from 'react-chatbot-kit';


const Homepage = (props) => {
    const [chatBot, setChatBot] = useState(false);
    const [messagesChatBot, setMessagesChatBot] = useState([]);

    const [districts, setDistricts] = useState([]);
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

    useEffect(() => {
        // Filter districts by type "Distrito"
        if (regions) {
            setDistricts(regions.filter(region => region.type === "Distrito"));
        }
    }, [regions]);


    const config = {
        initialMessages: [createChatBotMessage(`Olá! Como posso ajudar?`)], // Mensagem inicial do chatbot
        botName: 'RegionalizaBot', // Nome do bot,
        state: {
            data: electionSummary,
        }
    };

    return (
        <HomepageLayout main={
            <Grid direction="column">
                <FabChat chatBot={chatBot} setChatBot={setChatBot} />
                {chatBot && <Chat config={config} chatBot={chatBot} setChatBot={setChatBot} messagesChatBot={messagesChatBot} setMessagesChatBot={setMessagesChatBot} />}
                <Grid id="homepage-front" container direction="column" sx={{ justifyContent: "center", alignItems: "center", pt: 10 }} >
                    <Grid container direction="row" size={{ xs: 12 }} sx={{ justifyContent: "center", alignItems: "center", pb: 3 }}>
                        <Grid container direction="column" size={{ xs: 8.5, md: 3 }}>
                            <Grid item size={12}><h1 id="title" className="blue-at">A Minha Região</h1></Grid>
                            <Grid item size={12}><h5 id="subtitle" className="blue-at">O teu Portal Autárquico</h5></Grid>
                        </Grid>
                        <Grid item size={{ xs: 2, md: 1 }} sx={{ justifyContent: "center" }}>
                            <Image id="homepage-logo" src={logo} roundedCircle />
                        </Grid>
                    </Grid>
                    <Grid item size={{ xs: 10, md: 6 }}>
                        <AutoCompleteHomepage regions={regions} fetchRegionsById={fetchRegionsById} />
                    </Grid>
                    <Grid item sx={{ mt: 3 }}>
                        <h6 id="slogan">Informa-te sobre o histórico eleitoral autárquico da tua região.</h6>
                    </Grid>
                </Grid>
                <Grid item container direction="row" sx={{ mx: 3, mt: 3, alignItems: "center", justifyContent: "space-around" }}>
                    <Grid container direction="column" size={{ xs: 12, md: 6 }} sx={{ mr: { md: 8 } }} >
                        <Grid item>
                            <h2>Panorama Autárquico Nacional em {selectedYear}</h2>
                            <p className="ssn-subtitle">Quantas Câmaras Municipais lidera cada partido?</p>
                        </Grid>
                        <Grid item container direction="column">
                            <Grid item>
                                <PlotHomepage electionSummary={electionSummary} />
                            </Grid>
                            <Grid item>
                                <SliderHomepage electionYears={electionYears} setSelectedYear={setSelectedYear} fetchCountryElections={fetchCountryElections} />
                            </Grid>
                        </Grid>
                    </Grid>
                    <Grid item size={{ xs: 12, md: 4 }}>
                        <HomepageMap districts={districts} />
                    </Grid>
                </Grid>
                <hr />
                <Grid item container direction="row" >
                    <h2>Quem Somos?</h2>
                </Grid>
                <hr />
                <Grid item container direction="row">
                    <h2>O Prémio Arquivo PT 2025</h2>
                </Grid>
            </Grid>
        } />
    )
}

export default Homepage