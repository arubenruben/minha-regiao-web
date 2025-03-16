import React, { useEffect, useState } from 'react'
import GenericLayout from '../layouts/GenericLayout'
import { useSearchParams } from "react-router-dom";
import { fetchDistrict } from '../utils';
/*
  const fetchMunicipality = async (municipalityName) => {
    const municipality = await sendRequest(
      `${process.env.REACT_APP_ENDPOINT}/municipalities/?name=${municipalityName}`,
      'GET'
    );
    setMunicipality(municipality[0]);
  }


  useEffect(() => {
    const municipalityName = searchParams.get('name');
    fetchMunicipality(municipalityName);
  }, []);
*/
const District = (props) => {
    const [searchParams] = useSearchParams();
    const [district, setDistrict] = useState("");


    useEffect(() => {
        setDistrict(fetchDistrict(searchParams.get('name')));
    }, []);


    return (
        <GenericLayout
            main={
                <div>
                    Not Implemented Yet
                </div>
            }
        />
    )
}

export default District
