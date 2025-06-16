import React from 'react'
import GenericHeader from '../Components/Headers/GenericHeader'
import GenericFooter from '../components/footer/GenericFooter'

const GenericLayout = (props) => {
    return (
        <>
            {props.header ?? <GenericHeader />}
            {props.alert ?? <></>}
            {props.main ?? <main>{props.main}</main>}
            {props.footer ?? <GenericFooter />}
        </>
    )
}

export default GenericLayout