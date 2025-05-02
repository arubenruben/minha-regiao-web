import React, { useState, useEffect } from 'react'
import { MapContainer, TileLayer, Polygon } from 'react-leaflet';
import { invertCoordinates } from '../../utils';

const MunicipalityMap = ({ municipality }) => {
    const [center, setCenter] = useState(null)
    const [geoPolygon, setGeoPolygon] = useState(null)

    useEffect(() => {
        if (municipality.polygon_centroid) {
            setCenter(invertCoordinates(municipality.polygon_centroid.coordinates))
        }
        if (municipality.geo_polygon) {
            setGeoPolygon(invertCoordinates(municipality.geo_polygon.coordinates))
        }
    }, [municipality])

    return (
        <>
            {center && <MapContainer center={center} zoom={12} scrollWheelZoom={false} className="map-container">
                <TileLayer
                    attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
                />
                {geoPolygon && <Polygon positions={geoPolygon} pathOptions={{ color: 'purple' }} />}
            </MapContainer>}
        </>
    )
}

export default MunicipalityMap
