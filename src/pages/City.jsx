import React, { useEffect, useState } from 'react'
import { useSearchParams } from "react-router-dom";
import { fetchCity, fetchMunicipality } from '../utils';
import LocalLayout from '../layouts/LocalLayout';
import FormGeography from '../components/form/city/FormGeography';
import FormContacts from '../components/form/city/FormContacts';
import FormUsefullLinks from '../components/form/city/FormUsefullLinks';
import { averageLocalElections } from '../utils';

const City = (props) => {
    const [searchParams] = useSearchParams();
    const [city, setCity] = useState("");
    const [municipalities, setMunicipalities] = useState("");
    const [cityCapital, setCityCapital] = useState("");
    const [elections, setElections] = useState([]);

    useEffect(() => {
        const getCityData = async () => {
            try {
                const cityData = await fetchCity(searchParams.get('name'));
                setCity(cityData);

                const municipalitiesData = await fetchMunicipality(null, searchParams.get('name'));
                setMunicipalities(municipalitiesData);

                const capital = await fetchMunicipality(searchParams.get('name'), searchParams.get('name'));
                setCityCapital(capital[0]);

                setElections(averageLocalElections(municipalitiesData));
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        };

        getCityData();

    }, [searchParams]);


    return (
        <LocalLayout
            name={city.name}
            contactsTitle={'Contactos da Capital de Distrito'}
            formContacts={<FormContacts city={cityCapital} />}
            usefullLinksTitle={'Links Úteis'}
            formUsefullLinks={<FormUsefullLinks city={cityCapital} />}
            averageElections={elections}
        />
    )
}

export default City