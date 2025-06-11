import React from 'react'
import Carousel from 'react-bootstrap/Carousel';
import CardPresident from '../card/CardPresident';

const CarouselPresidents = (props) => {

    // Filter elections that include the president
    const elections = props.elections?.filter((election) => {
        return election?.president != null;
    });

    
    return (
        <Carousel>
            {elections?.map((election, index) => (
                <Carousel.Item key={index}>
                    <CardPresident election={election} />
                </Carousel.Item>
            ))}
        </Carousel>
    )
}

export default CarouselPresidents
