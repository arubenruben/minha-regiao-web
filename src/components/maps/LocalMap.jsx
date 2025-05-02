import React, { useState, useEffect } from 'react'
import { MapContainer } from 'react-leaflet/MapContainer';
import { TileLayer } from 'react-leaflet/TileLayer';
import { Polygon } from 'react-leaflet/Polygon';
import { Marker } from 'react-leaflet/Marker';
import { invertCoordinates } from '../../utils';

const LocalMap = (props) => {
    const [geoPolygons, setGeoPolygons] = useState(null);
    const [polygon_centroid, setPolygonCentroid] = useState(null);

    useEffect(() => {
        const geo_polygon = [];

        if (props.localities) {
            for (const locality of props.localities) {
                const coordinates = invertCoordinates(locality.geo_polygon.coordinates);
                geo_polygon.push(coordinates);
            }
            setGeoPolygons(geo_polygon);
        }

        if (props.polygon_centroid) {
            setPolygonCentroid(invertCoordinates(props.polygon_centroid.coordinates));
        }

    }, [props.localities, props.polygon_centroid])

    return (
        <>
            {polygon_centroid && <MapContainer className='map-container' center={polygon_centroid} zoom={9} scrollWheelZoom={true}>
                <TileLayer
                    attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
                />
                {geoPolygons && geoPolygons.map((geo_polygon, index) => {
                    return <Polygon key={index} pathOptions={{ color: 'purple' }} positions={geo_polygon} />
                })}
            </MapContainer>
            }
        </>
    )
}

export default LocalMap
