import React from 'react'
import { MapContainer } from 'react-leaflet/MapContainer';
import { TileLayer } from 'react-leaflet/TileLayer';

const ElectionMap = () => {
    const position = [39.6496747, -8.2081579]

    return (
        <MapContainer id="election-map" className='map-container' center={position} zoom={7} scrollWheelZoom={true}>
            <TileLayer
                attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
            />
        </MapContainer>
    )
}

export default ElectionMap
