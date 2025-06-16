import React from 'react'
import Carousel from 'react-bootstrap/Carousel';
import Card from 'react-bootstrap/Card';

const CarouselPresidentImages = (props) => {    
    return (
        <Carousel>
            {props.images?.map((image, index) => (
                <Carousel.Item key={index}>
                    <Card.Img                        
                        src={image.arquivo_pt_url}
                        alt={`Slide ${index + 1}`}
                    />                    
                </Carousel.Item>
            ))}

        </Carousel>
    )
}

export default CarouselPresidentImages
