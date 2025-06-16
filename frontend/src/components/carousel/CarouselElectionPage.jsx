import React from 'react'
import Image from 'react-bootstrap/Image';
import Carousel from 'react-bootstrap/Carousel';

const CarouselElectionPage = (props) => {    
    return (
        <Carousel>
            {props.election?.president?.images.map((image, index) => (
                <Carousel.Item key={index}>
                    <Image
                        className="president-image-election"
                        src={image.url}
                        alt={`Slide ${index + 1}`}
                        roundedCircle
                    />
                </Carousel.Item>
            ))}

        </Carousel>
    )
}

export default CarouselElectionPage
