import React, { useEffect, useState } from 'react'
import { useParams } from 'react-router-dom';
import { sendRequest } from '../utils';
import GenericLayout from '../layouts/GenericLayout';
import Grid from '@mui/material/Grid';
import LocalMap from '../components/maps/LocalMap';
import PlotVoters from '../components/plot/PlotVoters';
import { Slider } from '@mui/material';
import PlotNumberCities from '../components/plot/PlotNumberCities';
import TableDistrict from '../components/table/TableDistrict';
import CardWikipedia from '../components/card/CardWikipedia';
import Fab from '@mui/material/Fab';
import SliderDistrict from '../components/slider/SliderDistrict';

const District = (props) => {

    const { name } = useParams();
    const [district, setDistrict] = useState(null);
    const [electionYears, setElectionYears] = useState([]);
    const [selectedElectionYear, setSelectedElectionYear] = useState(null);
    const [elections, setElections] = useState([]);
    const [voters, setVoters] = useState([]);

    const fetchElectionYears = async (name) => {
        const response = await sendRequest(
            `${process.env.REACT_APP_ENDPOINT}/elections/years/`,
            "GET"
        );

        setElectionYears(response);
        setSelectedElectionYear(response[0]);
    }

    // Fetch districts from the API
    const fetchDistrict = async (name) => {
        const response = await sendRequest(
            `${process.env.REACT_APP_ENDPOINT}/districts/${name.trim()}`,
            "GET"
        );

        setDistrict(response);
    };

    const _constructElections = (city, election) => {
        // Use reduce to find both totalVotes and winner in a single pass

        const { totalVotes, winner } = election.election_results.reduce(
            (acc, result) => {
                const newTotal = acc.totalVotes + result.number_votes;
                const newWinner = !acc.winner || result.number_votes > acc.winner.number_votes ? result : acc.winner;
                return { totalVotes: newTotal, winner: newWinner };
            },
            { totalVotes: 0, winner: null }
        );

        return {
            city: city,
            election,
            winner: winner,
            totalVotes,
        };
    }

    const constructElections = (cities, selectedElectionYear) => {
        // Filter the elections based on the selected election year
        const filteredElections = cities.map((city) => {
            return city.elections.filter((election) => election.year === selectedElectionYear);
        }).flat();

        // Process elections data using map and reduce instead of for loops
        const newElections = filteredElections.map((election, i) => _constructElections(cities[i], election));

        // Sort newElections by city name
        setElections(newElections.sort((a, b) => a.city.name.localeCompare(b.city.name)));

    }
    const constructVoters = (cities, electionYears) => {
        const votersAccumulator = electionYears.map(year => {
            const totalVoters = cities.reduce((total, city) => {
                const election = city.elections.find(election => election.year === year);
                if (election) {
                    const results = _constructElections(city, election);
                    return total + results.totalVotes;
                }
                return total;
            }, 0);

            return { year, voters: totalVoters };
        });

        setVoters(votersAccumulator.sort((a, b) => a.year - b.year));
    }

    useEffect(() => {
        fetchDistrict(name).catch((error) => {
            console.error('Error fetching district:', error);
        });

        fetchElectionYears(name).catch((error) => {
            console.error('Error fetching election years:', error);
        });
    }, []);

    useEffect(() => {
        if (district) {
            constructElections(district.cities, selectedElectionYear);
        }
    }, [district, selectedElectionYear]);

    useEffect(() => {
        if (district && electionYears) {
            constructVoters(district.cities, electionYears);
        }
    }, [district, electionYears]);

    return (
        <GenericLayout
            main={
                <Grid container direction="column" >
                    <Grid item container direction="row" sx={{ my: { xs: 3, md: 5 }, justifyContent: "space-around" }}>
                        <Grid item size={{ xs: 0, md: 4 }} >
                            <LocalMap />
                        </Grid>
                        <Grid item container direction="column" size={{ xs: 12, md: 7 }}>
                            <Grid item>
                                <CardWikipedia wikipedia={district?.wikipedia} />
                            </Grid>
                            <Grid item sx={{ mt: 2 }}>
                                <h4>Variação no Número de Eleitores em Aveiro Desde 1974:</h4>
                            </Grid>
                            <Grid item sx={{ alignItems: { md: "center" } }}>
                                <PlotVoters title={"Variação no Número de Eleitores em Aveiro Desde 1974:"} voters={voters} />
                            </Grid>
                        </Grid>
                        {/* Map only for the smaller screens */}
                        <Grid item size={{ xs: 12, md: 0 }} >
                            <LocalMap />
                        </Grid>
                    </Grid>
                    <hr />
                    <Grid item>
                        <h2>Resultados Autárquicos nas Concelhias de {district?.name}:</h2>
                    </Grid>
                    <Grid item container direction="row" sx={{ alignItems: "center", justifyContent: "space-around" }}>
                        <Grid item size={{ sx: 12, md: 7 }}>
                            <TableDistrict elections={elections} />
                        </Grid>
                        <Grid item container direction="column" size={{ xs: 12, md: 5 }} sx={{ alignItems: "center", justifyContent: "center" }}>
                            <Grid item size={{ xs: 10 }} sx={{ mx: "auto" }}>
                                <SliderDistrict electionYears={electionYears} setSelectedElectionYear={setSelectedElectionYear} />
                            </Grid>
                            <Grid item size={{ xs: 12 }}>
                                <PlotNumberCities elections={elections} />
                            </Grid>
                        </Grid>
                    </Grid>
                </Grid>
            }
        />
    )
}

export default District