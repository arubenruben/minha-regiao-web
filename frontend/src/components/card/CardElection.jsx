import React from 'react'
import Card from 'react-bootstrap/Card';
import Grid from '@mui/material/Grid';
import Image from 'react-bootstrap/Image';
import { Button } from '@mui/material';
import { Link } from "react-router";

function CardElection(props) {

    const PARTYIMAGE = {
        "PS": "https://upload.wikimedia.org/wikipedia/pt/c/ce/Partido_Socialista_%28Portugal%29.png",
        "PPD/PSD.CDS-PP": "https://upload.wikimedia.org/wikipedia/commons/8/82/Flag_of_the_Social_Democratic_Party_%28Portugal%29.svg",
        "PCP-PEV": "https://upload.wikimedia.org/wikipedia/commons/2/27/Portuguese_Communist_Party_logo.svg",
        "B.E.": "https://upload.wikimedia.org/wikipedia/commons/3/38/LeftBloc.svg"
    }

    const obtainWinner = (election) => {
        let winner = election.results[0];
        election.results.forEach(result => {
            if (result.votes > winner.votes) {
                winner = result;
            }
        });
        return winner;
    }

    const winner = obtainWinner(props.election);

    return (
        <Grid container direction={'column'} justifyContent={'center'} alignItems={'center'} className='party-card'>
            <Grid item xs={12}>
                <Image src={PARTYIMAGE[winner.party]} className='party-card-img' roundedCircle />
            </Grid>
            <Grid item xs={6}>
                <Card>
                    <Card.Body>
                        <Card.Title>{props.election?.year}</Card.Title>
                        <Card.Text>
                            Vencedor: {winner.party}
                        </Card.Text>
                        <Link to={{
                            pathname: `/eleicoes`,
                            search: `?id=${props.election.id}`,
                        }}>
                            <Button variant="contained" color="primary">Ver detalhes</Button>
                        </Link>
                    </Card.Body>
                </Card>
            </Grid>
        </Grid>
    )
}

export default CardElection
