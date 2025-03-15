import React from 'react'
import Homepage from "./pages/Homepage";
//import Municipality from "./pages/Municipality";
//import President from "./pages/President";
import City from './pages/City';
import { Routes, Route } from 'react-router';
import './assets/css/app.css';
import 'leaflet/dist/leaflet.css';
{/* <Route path="/cidade" element={<City />} />
<Route path="/freguesia" element={<Municipality />} />
<Route path="/persnalidade" element={<President />} /> */}

const App = () => {
  return (
    <Routes>
      <Route path='/cidade' element={<City />} />
      <Route path="/" element={<Homepage />} />
    </Routes>
  )
}

export default App