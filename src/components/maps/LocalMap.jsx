import React, { useState, useCallback, useMemo } from 'react';
import { MapContainer, TileLayer, Polygon, Popup } from 'react-leaflet';
import { invertCoordinates } from '../../utils';

const LocalMap = ({ localities, polygon_centroid, endpoint }) => {
    const [map, setMap] = useState(null);
    const [popupPosition, setPopupPosition] = useState(null);
    const [selectedDistrictId, setSelectedDistrictId] = useState(null);

    const handlePolygonClick = useCallback((districtId, latlng) => {
        setSelectedDistrictId(districtId);
        setPopupPosition(latlng);

        if (map) {
            window.location.href = `/${endpoint}/${districtId}`;
        }
    }, [map]);

    const renderPolygons = useMemo(() => {
        if (!localities || !localities.length) return null;

        return localities.map(local => {
            if (!local.geo_polygon || !local.geo_polygon.coordinates) return null;

            const coordinates = invertCoordinates(local.geo_polygon.coordinates);

            return (
                <Polygon
                    key={local.id}
                    positions={coordinates}
                    pathOptions={{ color: 'purple' }}
                    eventHandlers={{
                        click: (e) => handlePolygonClick(local.name, e.latlng)
                    }}
                />
            );
        });
    }, [localities, handlePolygonClick]);

    const zoom = endpoint === "cidade" ? 8 : 11;

    return (
        <>
            {polygon_centroid && <MapContainer
                center={invertCoordinates(polygon_centroid.coordinates)}
                zoom={zoom}
                scrollWheelZoom={true}
                ref={setMap}
                style={{ height: "400px", width: "100%" }}
            >
                <TileLayer
                    attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
                />
                {renderPolygons}
            </MapContainer>}
        </>
    )
}

export default LocalMap
