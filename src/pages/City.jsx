import React, { useEffect } from 'react'
import { useSearchParams } from "react-router-dom";
import GenericLayout from '../layouts/GenericLayout';
const City = (props) => {
    const [searchParams] = useSearchParams();

    useEffect(() => {


    }, [searchParams]);


    return (
        <GenericLayout />
    )
}

export default City