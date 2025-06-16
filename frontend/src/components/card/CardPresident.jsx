import React from 'react'
import Card from 'react-bootstrap/Card';
import CarouselPresidentImages from '../carousel/CarouselPresidentImages';
import unknownPerson from '../../assets/images/Unknown_person.jpg';

const CardPresident = (props) => {
    
    return (
        <Card className="card-president">
            {props.election.president.images.length === 0 ? (
                <Card.Img variant="top" src={unknownPerson} />
            ) : (
                <CarouselPresidentImages images={props.election.president.images} />
            )}
            <Card.Body>
                <Card.Title>{props.election.president.name}</Card.Title>
                <Card.Text>
                    Início Mandato: {props.election.president.start_year}
                </Card.Text>
                <Card.Text>
                    Fim Mandato: {props.election.president.end_year}
                </Card.Text>                
            </Card.Body>
        </Card>
    )
}

export default CardPresident
