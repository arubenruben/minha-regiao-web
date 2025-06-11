import React from 'react'
import Homepage from "./pages/Homepage";
import City from './pages/City';
import { Routes, Route } from 'react-router';
import './assets/css/app.css';
import 'leaflet/dist/leaflet.css';
import Municipality from './pages/Municipality';
import 'bootstrap/dist/css/bootstrap.min.css';
import Election from './pages/Election';
import District from './pages/District';

const App = () => {
  return (
    <Routes>
      <Route path='/freguesia/:id' element={<Municipality />} />
      <Route path='/distrito/:name' element={<District />} />
      <Route path='/cidade/:name' element={<City />} />
      <Route path="/eleicao/:type/:name/:year" element={<Election />} />
      <Route path="/" element={<Homepage />} />
    </Routes>
  )
}

export default App