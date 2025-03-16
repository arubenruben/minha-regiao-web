import React, { useEffect, useState } from 'react'
import { useSearchParams } from "react-router-dom";
import { fetchDistrict, fetchCity } from '../utils';
import LocalLayout from '../layouts/LocalLayout';
import FormGeography from '../components/form/city/FormGeography';
import FormContacts from '../components/form/city/FormContacts';
import FormUsefullLinks from '../components/form/city/FormUsefullLinks';
import { averageLocalElections } from '../utils';

const District = (props) => {
    const [searchParams] = useSearchParams();
    const [district, setDistrict] = useState("");
    const [cities, setCities] = useState("");
    const [districtCapital, setDistrictCapital] = useState("");
    const [elections, setElections] = useState([]);

    useEffect(() => {
        const getDistrictData = async () => {
            try {
                const districtData = await fetchDistrict(searchParams.get('name'));
                setDistrict(districtData);

                const citiesData = await fetchCity(null, searchParams.get('name'));
                setCities(citiesData);

                const capital = await fetchCity(searchParams.get('name'), searchParams.get('name'));
                setDistrictCapital(capital[0]);

                setElections(averageLocalElections(citiesData));
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        };

        getDistrictData();

    }, [searchParams]);



    return (
        <LocalLayout
            name={district.name}
            contactsTitle={'Contactos da Capital de Distrito'}
            formContacts={<FormContacts city={districtCapital} />}
            usefullLinksTitle={'Links Úteis'}
            formUsefullLinks={<FormUsefullLinks city={districtCapital} />}
            elections={district.elections}
        />
    )
}

export default District
