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
import AccordionPlots from '../components/accordion/AccordionPlots';
import PlotAbstention from '../components/plot/PlotAbstention';
import FabChat from '../components/fab/FabChat';
import Chat from '../components/chat/Chat';
import { createChatBotMessage } from 'react-chatbot-kit';
import Breadcrumbs from '@mui/material/Breadcrumbs';


const District = (props) => {
    const [chatBot, setChatBot] = useState(false);

    const { name } = useParams();
    const [district, setDistrict] = useState(null);
    const [electionYears, setElectionYears] = useState([]);
    const [selectedElectionYear, setSelectedElectionYear] = useState(null);

    const fetchElectionYears = async (name) => {
        const response = await sendRequest(
            `${process.env.REACT_APP_ENDPOINT}/elections/years`,
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

    const config = {
        initialMessages: [createChatBotMessage(`Olá! Como posso ajudar?`)], // Mensagem inicial do chatbot
        botName: 'RegionalizaBot', // Nome do bot,
        state: {
            data: { district: district, electionYears: electionYears },
        }
    };

    const breadCrumbs = [
        <Link key="1" to="/">
            Ínicio
        </Link>,
        <Link key="2" to={`/distrito/${district?.name}`}>
            {district?.name}
        </Link>
    ]

    return (
        <GenericLayout
            main={
                <Grid container direction="column" >
                    <FabChat chatBot={chatBot} setChatBot={setChatBot} />
                    {chatBot && <Chat config={config} />}
                    <Grid item container direction="row" sx={{ alignItems: "center", mt: 2, ml: 2 }}>
                        <Grid item>
                            <Breadcrumbs separator=">" sx={{ mb: 2 }}>
                                {breadCrumbs}
                            </Breadcrumbs>
                        </Grid>
                    </Grid>
                    <Grid item container direction="row" sx={{ mt: 3, justifyContent: "space-around", ml: { md: 3 } }}>
                        <Grid item size={{ xs: 0, md: 4 }} sx={{ display: { xs: "none", md: "block" } }}>
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
                            <Grid item sx={{ mt: {xs: 3}, display: { xs: "block", md: "none" } }}>
                                <LocalMap
                                    localities={district?.cities}
                                    polygon_centroid={district?.polygon_centroid}
                                    endpoint={"cidade"}
                                />
                                <p className="ssn-subtitle">Navega pelo nosso mapa</p>
                            </Grid>
                            <hr />
                            <AccordionPlots
                                plotVoters={<PlotVotersDistrict cities={district?.cities} electionYears={electionYears} />}
                                plotAbstention={<PlotAbstention cities={district?.cities} electionYears={electionYears} />}
                            />
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