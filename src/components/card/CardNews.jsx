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
            <Card.Header>
                <Grid container direction="row" sx={{ justifyContent: "space-between", alignItems: "center" }}>
                    <Grid item>
                        {props.news.title}
                    </Grid>
                    <Grid item size={1}>
                        <Button variant="" href={props.news.url_arquivo} target="_blank" rel="noopener noreferrer" className="btn-open-in-new">
                            <OpenInNewIcon />
                        </Button>
                    </Grid>
                </Grid>
            </Card.Header>
            <Card.Body>
                <Card.Text>
                    <iframe src={props.news.url_arquivo} style={{ height: "800px", width: "100%" }}></iframe>
                </Card.Text>
            </Card.Body>
            <Card.Footer className="text-muted">
                <Grid container direction="row" sx={{ justifyContent: "space-between", alignItems: "center" }}>
                    <Grid item size={4}>
                        <span>In: {props.news.newspaper.name}</span>
                    </Grid>
                    <Grid item>
                        <Chip label={decodeTopic(props.news.topic)} variant="outlined"/>
                    </Grid>
                </Grid>
            </Card.Footer>
        </Card>
    )
}

export default CardNews
