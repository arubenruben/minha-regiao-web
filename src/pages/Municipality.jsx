import React, { useEffect, useState } from 'react'
import { Grid } from '@mui/material';
import { useParams } from 'react-router-dom';
import GenericLayout from '../layouts/GenericLayout';
import { sendRequest } from '../utils';
import LocalMap from '../components/maps/LocalMap';
import CardWikipedia from '../components/card/CardWikipedia';
import PlotVoters from '../components/plot/PlotVoters';
import TableCityHistoric from '../components/table/TableCityHistoric';
import { Link } from 'react-router-dom';
import NorthWestIcon from '@mui/icons-material/NorthWest';
import CardPresident from '../components/card/CardPresident';
import Alert from 'react-bootstrap/Alert';
import PlotHistory from '../components/plot/PlotHistory';
import MunicipalityMap from '../components/maps/MunicipalityMap';

const Municipality = (props) => {
  const { name } = useParams();

  const [municipality, setMunicipality] = useState({});
  const [, setElectionYears] = useState([]);
  const [, setSelectedElectionYear] = useState(null);
  const [filteredElections, setFilteredElections] = useState([]);

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
    setSelectedElectionYear(response[0]);
  }

  useEffect(() => {
    fetchMunicipality(name);
    fetchElectionYears(name);
  }, [name]);

  useEffect(() => {
    if (municipality) {
      setFilteredElections(
        municipality.elections?.filter((election) => {
          // if municipality has a new_municipality, filter out elections after 2012
          if (municipality.new_municipality) {
            return election.year <= 2012;
          }
          return election.year >= 2012;
        }) || []
      )
    }
  }, [municipality]);

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
            <Grid item container direction="column" size={{ xs: 7 }}>
              <Grid item>
                <CardWikipedia name={municipality?.name} wikipedia={municipality?.wikipedia} />
              </Grid>
              <hr />
              <Grid item sx={{ mt: 2 }}>
                <h4>Variação no Número de Eleitores em {municipality?.name} Desde 1974:</h4>
              </Grid>
              <Grid item sx={{ alignItems: "center" }}>
                <PlotVoters elections={filteredElections} />
              </Grid>
            </Grid>
            <Grid item size={{ xs: 4 }} >
              <MunicipalityMap municipality={municipality} />
            </Grid>
          </Grid>
          <hr />
          <Grid item>
            <h3>Histórico na Junta de Freguesia</h3>
          </Grid>
          <Grid container item direction="row" sx={{ alignItems: "center" }}>
            <Grid item size={{ xs: 7 }}>
              <TableCityHistoric name={municipality?.name} elections={filteredElections} endpoint={"freguesia"} />
            </Grid>
            <Grid item size={{ xs: 5 }}>
              <PlotHistory elections={municipality?.elections} />
            </Grid>
          </Grid>
          <hr />
          <Grid item sx={{ mt: 3 }}>
            <h3>Os Presidentes de Junta:</h3>
          </Grid>
          <Grid item container direction="row" sx={{ justifyContent: "space-around", alignItems: "center", mt: 3 }}>
            {municipality.elections?.map((election, index) => {
              return (
                <Grid item size={{ xs: 2 }} key={index} >
                  <CardPresident election={election} />
                </Grid>
              ) ? election.president?.name !== null : null
            })}
          </Grid>
        </Grid >
      } />
  )
}

export default Municipality
