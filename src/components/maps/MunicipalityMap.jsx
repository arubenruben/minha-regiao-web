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

        if (municipality.old_geo_polygon) {
            setGeoPolygon(invertCoordinates(municipality.old_geo_polygon.coordinates))
        }
        if (municipality.old_polygon_centroid) {
            setCenter(invertCoordinates(municipality.old_polygon_centroid.coordinates))
        }
    }, [municipality])

    return (
        <>
            {center && <MapContainer 
            center={center} 
            zoom={12} 
            scrollWheelZoom={false}
            style={{ height: "400px", width: "100%" }}>                
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
