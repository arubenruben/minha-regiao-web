import React from 'react'
import Card from 'react-bootstrap/Card';
import Chip from '@mui/material/Chip';

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
            <Card.Header>{props.news.newspaper.name}</Card.Header>
            <Card.Body>
                <Card.Text>
                    {props.news.content}
                </Card.Text>
            </Card.Body>
            <Card.Footer className="text-muted">
                <Chip label={decodeTopic(props.news.topic)} variant="outlined" />
            </Card.Footer>
        </Card>
    )
}

export default CardNews
