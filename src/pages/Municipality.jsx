import React, { useEffect, useState } from 'react'
import { useSearchParams } from "react-router-dom";
import { sendRequest } from '../utils';
import LocalLayout from '../layouts/LocalLayout';
import FormGeography from '../components/form/municipality/FormGeography';
import FormContacts from '../components/form/municipality/FormContacts';
import FormUsefullLinks from '../components/form/municipality/FormUsefullLinks';

const Municipality = (props) => {
  const [searchParams] = useSearchParams();
  const [municipality, setMunicipality] = useState({});

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

  return (
    <LocalLayout
      name={municipality.name}
      geographyTitle={'Geografia'}
      formGeography={<FormGeography municipality={municipality} />}
      contactsTitle={'Contactos Junta de Freguesia'}
      formContacts={<FormContacts municipality={municipality} />}
      usefullLinksTitle={'Links Úteis'}
      formUsefullLinks={<FormUsefullLinks municipality={municipality} />}
      elections={municipality.elections}
    />

    /*
    <GenericLayout
    main={
      <Grid container direction={'column'} sx={{ mb: 5 }}>
      <Grid item xs={6}>
      <h1>{municipality.name}</h1>
      </Grid>
      
      <Grid item container direction={'row'} justifyContent={'space-between'}>
      <Grid container item direction={'column'} size={6}>
      <Form>
      <InputGroup className="mb-3">
      <InputGroup.Text>Nome</InputGroup.Text>
      <Form.Control
      value={municipality?.name}
      readOnly
      />
      </InputGroup>
      <InputGroup className="mb-3">
      <InputGroup.Text>Concelho</InputGroup.Text>
      <Form.Control
      value={municipality?.city?.name}
      readOnly
      />
      </InputGroup>
      <InputGroup className="mb-3">
      <InputGroup.Text>Distrito</InputGroup.Text>
      <Form.Control
      value={municipality?.city?.district?.name}
      readOnly
      />
      </InputGroup>
      <InputGroup className="mb-3">
      <InputGroup.Text>Código Postal</InputGroup.Text>
      <Form.Control
      value={municipality?.zip_code?.split('-')[0]}
      readOnly
      />
      </InputGroup>
      
      <Divider />
      
      <h3>Contactos Junta de Freguesia</h3>
      
      <InputGroup className="mb-3">
      <InputGroup.Text>Presidente da Junta Atual</InputGroup.Text>
      <Form.Control
      value={municipality?.president}
      readOnly
      />
      </InputGroup>
      <InputGroup className="mb-3">
      <InputGroup.Text>Morada da Junta de Freguesia</InputGroup.Text>
      <Form.Control
      value={municipality?.address}
      readOnly
      />
      </InputGroup>
      <InputGroup className="mb-3">
      <InputGroup.Text>Email da Junta de Freguesia</InputGroup.Text>
      <Form.Control
      value={municipality?.email}
      readOnly
      />
      </InputGroup>
      
      <InputGroup className="mb-3">
      <InputGroup.Text>Telefone da Junta de Freguesia</InputGroup.Text>
      <Form.Control
      value={municipality?.phone}
      readOnly
      />
      </InputGroup>
      
      <Divider />
      
      <h3>Links Úteis</h3>
      
      <InputGroup className="mb-3">
      <InputGroup.Text>URL Freguesias PT</InputGroup.Text>
      <Form.Control
      value={municipality?.freguesias_pt_url}
      readOnly
      />
      </InputGroup>
      </Form>
      </Grid>
      <Grid item size={6}>
      <LocalMap />
      </Grid>
      </Grid>
      <Divider />
      <Grid item>
      <h2>Eleições Autárquicas</h2>
      </Grid>
      <Grid container direction={'row'} justifyContent={'center'}>
      <PlotElection elections={municipality?.elections} />
      </Grid>
      <Divider />
      <Grid container direction={'row'} justifyContent={'center'}>
      {municipality?.elections?.map((election, index) => <CardElection key={index} election={election} />)}
      </Grid>
      </Grid>
    }
    />
    */
  )
}

export default Municipality
