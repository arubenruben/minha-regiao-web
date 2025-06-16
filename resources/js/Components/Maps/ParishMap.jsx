import React, { useState, useEffect } from 'react'
import { MapContainer, TileLayer, Polygon } from 'react-leaflet';
import { invertCoordinates } from '../../utils';

const ParishMap = ({ parish }) => {
    const [center, setCenter] = useState(null)
    const [geoPolygon, setGeoPolygon] = useState(null)

    useEffect(() => {
        if (parish.polygon_centroid) {
            setCenter(invertCoordinates(parish.polygon_centroid.coordinates))
        }
        if (parish.geo_polygon) {
            setGeoPolygon(invertCoordinates(parish.geo_polygon.coordinates))
        }

        if (parish.old_geo_polygon) {
            setGeoPolygon(invertCoordinates(parish.old_geo_polygon.coordinates))
        }
        if (parish.old_polygon_centroid) {
            setCenter(invertCoordinates(parish.old_polygon_centroid.coordinates))
        }
    }, [parish])

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

export default ParishMap