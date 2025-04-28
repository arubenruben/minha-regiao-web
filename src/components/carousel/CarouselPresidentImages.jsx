import React from 'react'
import Carousel from 'react-bootstrap/Carousel';

const CarouselPresidentImages = (props) => {    
    return (
        <Carousel>
            {props.images?.map((image, index) => (
                <Carousel.Item key={index}>
                    <img
                        className="president-image"
                        src={image.url}
                        alt={`Slide ${index + 1}`}
                    />
                </Carousel.Item>
            ))}

        </Carousel>
    )
}

export default CarouselPresidentImages
