import React from 'react'
import FabChat from '../components/fab/FabChat';
import GenericFooter from '../components/footer/GenericFooter';


const HomepageLayout = (props) => {
    return (
        <>
            {props.main ?? <main>{props.main}</main>}
            {props.footer ?? <GenericFooter />}
        </>
    )
}

export default HomepageLayout
