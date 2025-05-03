import React, { useEffect, useState } from 'react'
import { Grid } from '@mui/material';
import { useParams } from 'react-router-dom';
import GenericLayout from '../layouts/GenericLayout';
import { sendRequest } from '../utils';
import PlotVoters from '../components/plot/PlotVoters';
import TableCityHistoric from '../components/table/TableCityHistoric';
import { Link } from 'react-router-dom';
import NorthWestIcon from '@mui/icons-material/NorthWest';
import CardPresident from '../components/card/CardPresident';
import Alert from 'react-bootstrap/Alert';
import PlotHistory from '../components/plot/PlotHistory';
import MunicipalityMap from '../components/maps/MunicipalityMap';
import AccordionWikipedia from '../components/accordion/AccordionWikipedia';

const Municipality = (props) => {
  const { name } = useParams();

  const [municipality, setMunicipality] = useState({});
  const [, setElectionYears] = useState([]);
  const [, setSelectedElectionYear] = useState(null);

  const fetchMunicipality = async (municipalityName) => {
    const response = await sendRequest(
      `${process.env.REACT_APP_ENDPOINT}/municipalities/${municipalityName}`,
      'GET'
    );
    setMunicipality(response);
  }

  const fetchElectionYears = async (name) => {
    const response = await sendRequest(
      `${process.env.REACT_APP_ENDPOINT}/elections/years/`,
      "GET"
    );

    setElectionYears(response);
  }

  useEffect(() => {
    fetchMunicipality(name);
    fetchElectionYears(name);
  }, [name]);

  console.log(municipality);
  
  return (
    <GenericLayout
      alert={
        <>
          {municipality?.new_municipality ? <Alert variant="warning" style={{ margin: "10px" }} >
            <Alert.Heading>Freguesia Extinta na Reorganização administrativa do território (Lei n.º 22/2012, de 30 de maio)</Alert.Heading>
            <p>Nova Designação: <Link to={`/freguesia/${municipality.new_municipality.name}`}> {municipality.new_municipality.name}</Link></p>
          </Alert > : null}
          {municipality?.old_municipalities?.length > 0 ? <Alert variant="warning" style={{ margin: "10px" }} >
            <Alert.Heading>Freguesia resultante da fusão de freguesias</Alert.Heading>
            <p>Freguesia resultante da fusão de freguesias:
              {municipality?.old_municipalities?.map((old_municipality, index) => {
                return (
                  <Link key={index} to={`/freguesia/${old_municipality.name}`}> {old_municipality.name}</Link>
                )
              })}
            </p>
          </Alert > : null}
        </>
      }
      main={
        < Grid container direction="column" >
          <Grid item container direction="row" sx={{ alignItems: "center", mt: 2, ml: 2 }}>
            <Grid item>
              <span>
                <NorthWestIcon sx={{ fontSize: 20 }} />
                <Link to={`/cidade/${municipality?.city?.name}`}>
                  Voltar para a Página da Cidade{municipality?.city?.name}
                </Link>
              </span>
            </Grid>
          </Grid>
          <Grid item container direction="row" sx={{ justifyContent: "space-around", mt: 3, mb: 5 }}>
            <Grid item size={{ xs: 4 }} >
              <MunicipalityMap municipality={municipality} />
            </Grid>
            <Grid item container direction="column" size={{ xs: 7 }}>
              <Grid item>
                <AccordionWikipedia name={municipality?.name} wikipedia={municipality?.wikipedia} />
              </Grid>
              <hr />
              <Grid item sx={{ mt: 2 }}>
                <h4>Número de Eleitores em {municipality?.name} Desde 1974:</h4>
              </Grid>
              <Grid item sx={{ alignItems: "center" }}>
                <PlotVoters elections={municipality?.elections} />
              </Grid>
            </Grid>
          </Grid>
          <hr />
          <Grid item>
            <h3>Histórico na Junta de Freguesia</h3>
          </Grid>
          <Grid container item direction="column" sx={{ alignItems: "center" }}>
            <Grid item size={{ xs: 10 }} sx={{ my: 3 }}>
              <PlotHistory elections={municipality?.elections} />
            </Grid>
            <Grid item size={{ xs: 8 }}>
              <TableCityHistoric name={municipality?.name} elections={municipality?.elections} endpoint={"freguesia"} />
            </Grid>
          </Grid>
        </Grid >
      } />
  )
}

export default Municipality
