import React, { useState, useEffect } from 'react'
import { MapContainer } from 'react-leaflet/MapContainer';
import { TileLayer } from 'react-leaflet/TileLayer';
import { Polygon } from 'react-leaflet/Polygon';
import { invertCoordinates } from '../../utils';

const HomepageMap = (props) => {
    const [geoPolygons, setGeoPolygons] = useState(null);

    useEffect(() => {
        if (!props.districts || props.districts.length === 0)
            return

        const polygons = []

        if (props.districts) {
            props.districts.forEach((district) => {
                // Invert the coordinates to match the Leaflet format
                const invertedCoordinates = invertCoordinates(district.geo_polygon.coordinates)
                polygons.push(invertedCoordinates)
            })
        }
        setGeoPolygons(polygons)

    }, [props.districts])

    return (
        <>
            {geoPolygons && <MapContainer className='map-container' center={[39.6496747, -8.2081579]} zoom={7} scrollWheelZoom={true}>
                <TileLayer
                    attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
                />

                {geoPolygons.map((polygon, index) => (
                    <Polygon key={index} pathOptions={{ color: 'purple' }} positions={polygon} />
                ))}

            </MapContainer>}
        </>
    )
}

export default HomepageMap