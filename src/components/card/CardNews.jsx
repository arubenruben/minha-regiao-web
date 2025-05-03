import React from 'react'
import Card from 'react-bootstrap/Card';
import Chip from '@mui/material/Chip';
import Grid from '@mui/material/Grid';
import OpenInNewIcon from '@mui/icons-material/OpenInNew';
import Button from 'react-bootstrap/Button';

const CardNews = (props) => {
    const decodeTopic = (topic) => {
        switch (topic) {
            case 'promises':
                return 'Promessas Eleitorais'
            case 'president':
                return 'Pesquisa pelo Nome do Presidente'
            case 'name':
                return 'Pesquisa por Autárquicas na Região'
            case 'education':
                return 'Educação'
            default:
                return topic
        }
    }

    return (
        <Card className="card-news">
            <Card.Body>
                <iframe src={props.news.url_arquivo} style={{ height: "100%", width: "100%" }}></iframe>                
            </Card.Body>
            <Card.Footer className="text-muted">
                <Grid container direction="row" sx={{ justifyContent: "space-between", alignItems: "center" }}>
                    <Grid item size={4}>
                        <a href={props.news.url_arquivo}>In: {props.news.newspaper.name}</a>
                    </Grid>
                    <Grid item>
                        <Chip label={decodeTopic(props.news.topic)} variant="outlined" />
                    </Grid>
                </Grid>
            </Card.Footer>
        </Card>
    )
}

export default CardNews
