import React from 'react'
import Carousel from 'react-bootstrap/Carousel';

const SubTitleCarousel = (props) => {
    return (
        <Carousel indicators={false} controls={false} interval={props.interval ?? 2000}>
            <Carousel.Item>
                <h5 id="subtitle">O seu Portal Autárquico</h5>
            </Carousel.Item>
            <Carousel.Item>
                <h5 id="subtitle">Notícias da Região</h5>
            </Carousel.Item>
            <Carousel.Item>
                <h5 id="subtitle">A Regionalização</h5>
            </Carousel.Item>
            <Carousel.Item>
                <h5 id="subtitle">E muito mais...</h5>
            </Carousel.Item>
        </Carousel>
    )
}

export default SubTitleCarousel
