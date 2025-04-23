import React from 'react'
import Carousel from 'react-bootstrap/Carousel';

const SubTitleCarousel = () => {
    return (
        <Carousel indicators={false} controls={false}>
            <Carousel.Item>
                <h4 id="subtitle">O seu Portal Autárquico</h4>
            </Carousel.Item>
            <Carousel.Item>
                <h4 id="subtitle">Notícias da Região</h4>
            </Carousel.Item>
            <Carousel.Item>
                <h4 id="subtitle">E muito mais...</h4>
            </Carousel.Item>
        </Carousel>
    )
}

export default SubTitleCarousel
