import React from 'react'
import Homepage from "./pages/Homepage";
import City from './pages/City';
import { Routes, Route } from 'react-router';
import './assets/css/app.css';
import 'leaflet/dist/leaflet.css';
import Municipality from './pages/Municipality';

const App = () => {
  return (
    <Routes>
      <Route path='/freguesia' element={<Municipality />} />
      <Route path='/cidade' element={<City />} />
      <Route path="/" element={<Homepage />} />
    </Routes>
  )
}

export default App