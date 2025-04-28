import React from 'react'
import Card from 'react-bootstrap/Card';

const CardWikipedia = (props) => {

    return (
        <Card className="card-wikipedia">
            <Card.Header>{props.wikipedia?.title}</Card.Header>
            <Card.Body>
                <Card.Text>
                    {props.wikipedia?.summary}
                </Card.Text>
                <Card.Link href={props.wikipedia?.wikipedia_url}>Fonte: Wikipédia</Card.Link>
            </Card.Body>
        </Card>
    )
}

export default CardWikipedia
