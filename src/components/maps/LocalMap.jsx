import React, { useState, useEffect } from 'react'
import { MapContainer } from 'react-leaflet/MapContainer';
import { TileLayer } from 'react-leaflet/TileLayer';
import { Polygon } from 'react-leaflet/Polygon';
import { Marker } from 'react-leaflet/Marker';

const LocalMap = (props) => {
    const position = [39.6496747, -8.2081579]
    const [geo_polygon, setGeoPolygon] = useState(null);
    const [polygon_centroid, setPolygonCentroid] = useState(null);

    useEffect(() => {
        if (props.geo_polygon) {
            // Invert the coordinates to match the Leaflet format
            // Geo polygon is a variable number of lists of coordinates. I need to iterate through the lists and invert the coordinates of each list.
            // It can be a list of lists or a list of lists of lists or a list of lists of lists of lists.
            // I will use recursion to invert the coordinates of each list.
            const invertCoordinates = (coordinates) => {
                if (Array.isArray(coordinates[0])) {
                    return coordinates.map(invertCoordinates);
                } else {
                    return [coordinates[1], coordinates[0]];
                }
            }

            const invertedCoordinates = invertCoordinates(props.geo_polygon.coordinates[0]);
            
            console.log(invertedCoordinates);
            
            setGeoPolygon(invertedCoordinates);
        }
        if (props.polygon_centroid) {
            // Invert the coordinates to match the Leaflet format            
            setPolygonCentroid([props.polygon_centroid.coordinates[1], props.polygon_centroid.coordinates[0]]);
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
