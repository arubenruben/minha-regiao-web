import React from 'react'
import Card from 'react-bootstrap/Card';
import Grid from '@mui/material/Grid2';
import Image from 'react-bootstrap/Image';
import { Button } from '@mui/material';

function CardElection(props) {
    return (
        <Grid container direction={'column'} justifyContent={'center'} alignItems={'center'}>        
            <Grid item xs={6}>
                <Image src="https://upload.wikimedia.org/wikipedia/pt/c/ce/Partido_Socialista_%28Portugal%29.png" roundedCircle />
            </Grid>
            <Grid item xs={6}>
                <Card>
                    <Card.Body>
                        <Card.Title>{props.election?.year}</Card.Title>
                        <Card.Text>
                            Some quick example text to build on the card title and make up the
                            bulk of the card's content.
                        </Card.Text>  
                        <Button variant="contained" color="primary">Ver detalhes</Button>                      
                    </Card.Body>
                </Card>
            </Grid>
        </Grid>
    )
}

export default CardElection
