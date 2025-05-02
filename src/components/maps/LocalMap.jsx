import React, { useState, useEffect } from 'react'
import { MapContainer } from 'react-leaflet/MapContainer';
import { TileLayer } from 'react-leaflet/TileLayer';
import { Polygon } from 'react-leaflet/Polygon';
import { Marker } from 'react-leaflet/Marker';
import { invertCoordinates } from '../../utils';

const LocalMap = (props) => {
    const [geo_polygon, setGeoPolygon] = useState(null);
    const [polygon_centroid, setPolygonCentroid] = useState(null);

    useEffect(() => {
        if (props.geo_polygon) {
            const a = invertCoordinates(props.geo_polygon.coordinates)
            console.log(a);

            setGeoPolygon(a);
        }
        if (props.polygon_centroid) {
            // Invert the coordinates to match the Leaflet format            
            const b = invertCoordinates(props.polygon_centroid.coordinates)
            console.log(b);
            setPolygonCentroid(b);
        }
    }, [props.geo_polygon, props.polygon_centroid])


    return (
        <>
            {polygon_centroid && <MapContainer className='map-container' center={polygon_centroid} zoom={9} scrollWheelZoom={true}>
                <TileLayer
                    attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
                />
                <Polygon pathOptions={{ color: 'purple' }} positions={geo_polygon} />
            </MapContainer>
            }
        </>
    )
}

export default LocalMap
