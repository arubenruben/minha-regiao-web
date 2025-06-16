import GenericFooter from '@/Components/Footers/GenericFooter'
import GenericHeader from '@/Components/Headers/GenericHeader'
import React from 'react'

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