import React, { useState, useEffect } from 'react';
import { MapContainer } from 'react-leaflet/MapContainer';
import { TileLayer } from 'react-leaflet/TileLayer';
import { Polygon } from 'react-leaflet/Polygon';
import { invertCoordinates } from '../../utils';

const HomepageMap = ({ districts }) => {
    const [geoPolygons, setGeoPolygons] = useState([]);

    useEffect(() => {
        if (!districts || districts.length === 0) return;

        const polygons = districts.map(district =>
            invertCoordinates(district.geo_polygon.coordinates)
        );

        setGeoPolygons(polygons);
    }, [districts]);

    return (
        <>
            {geoPolygons.length > 0 && (
                <MapContainer className='map-container' center={[39.6496747, -8.2081579]} zoom={7} scrollWheelZoom={true}>
                    <TileLayer
                        attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
                    />
                    {geoPolygons.map((polygon, index) => (
                        <Polygon key={index} pathOptions={{ color: 'purple' }} positions={polygon} />
                    ))}
                </MapContainer>
            )}
        </>
    );
};

export default HomepageMap;
