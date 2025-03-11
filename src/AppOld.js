import Grid from '@mui/material/Grid2';
import { Paper, Typography } from '@mui/material';
import { MapContainer, TileLayer } from 'react-leaflet'

function App() {
  return (
    <Grid container spacing={3}>
      <Grid item xs={12}>
        <Paper>
          <Typography variant="h5" component="h3">
            This is a sheet of paper.
          </Typography>
          <Typography component="p">
            Paper can be used to build surfaces or other elements for your application.
          </Typography>
        </Paper>
      </Grid>
      <Grid item xs={6}>
        <Paper>
          <Typography variant="h5" component="h3">
            This is a sheet of paper.
          </Typography>
          <Typography component="p">
            Paper can be used to build surfaces or other elements for your application.
          </Typography>
        </Paper>
      </Grid>
      <Grid item xs={6}>
        <div className="App">
          <MapContainer center={[51.505, -0.09]} zoom={13} scrollWheelZoom={false}>
            <TileLayer
              attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
              url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
            />
          </MapContainer>
        </div>
      </Grid>
    </Grid>
  );
}

export default App;
