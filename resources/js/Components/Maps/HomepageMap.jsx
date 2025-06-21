import React, { useState, useCallback, useMemo } from 'react';
import { MapContainer, TileLayer, Polygon } from 'react-leaflet';
import { invertCoordinates } from '../../utils';
import { router } from '@inertiajs/react'

const HomepageMap = ({ districts }) => {
    const [map, setMap] = useState(null);

    const center = [39.6496747, -8.2081579];
    const zoom = 6;

    const handlePolygonClick = useCallback((district) => {
        if (map) {
            router.visit(route("districts.show", { district: district.name }));
        }
    }, [map]);

    const renderPolygons = useMemo(() => {
        if (!districts || !districts.length)
            return null;

        return districts.map(district => {
            const coordinates = invertCoordinates(district.geo_polygon.coordinates);

            return (
                <Polygon
                    key={district.id}
                    positions={coordinates}
                    pathOptions={{ color: 'purple' }}
                    eventHandlers={{
                        click: (e) => handlePolygonClick(district, e.latlng)
                    }}
                />
            );
        });
    }, [districts, handlePolygonClick]);

    return (
        <div className="map-container">
            <MapContainer
                center={center}
                zoom={zoom}
                scrollWheelZoom={true}
                ref={setMap}
                style={{ height: '400px', width: '100%' }}
            >
                <TileLayer
                    attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
                />
                {renderPolygons}
            </MapContainer>
        </div>
    );
};

export default HomepageMap;