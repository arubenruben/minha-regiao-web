import React from 'react'
import GenericHeader from '../components/header/GenericHeader'
import GenericFooter from '../components/footer/GenericFooter'

const GenericLayout = (props) => {
    return (
        <>
            {props.header ?? <GenericHeader />}
            {props.alert ?? null}
            {props.main ?? <main>{props.main}</main>}
            {props.footer ?? <GenericFooter />}
        </>
    )
}

export default GenericLayout