import React, { useState, useCallback, useMemo } from 'react';
import { MapContainer, TileLayer, Polygon, Popup } from 'react-leaflet';
import { invertCoordinates } from '../../utils';
import { router } from '@inertiajs/react'

const LocalMap = ({ localities, polygon_centroid }) => {
    const [map, setMap] = useState(null);

    const handlePolygonClick = useCallback((local) => {
        if (!map) {
            console.warn("Map is not initialized");
            return;
        }

        if (local.type === "district")
            router.visit(route("districts.show", { district: local.name }));
        else if (local.type === "city")
            router.visit(route("cities.show", { city: local.name }));
        else if (local.type === "parish")
            router.visit(route("parishes.show", { parish: local.freguesia_pt_entry_id }));

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
                        click: (e) => handlePolygonClick(local)
                    }}
                />
            );
        });
    }, [localities, handlePolygonClick]);

    const zoom = useMemo(() => {
        if (!localities || !localities.length) return 11; // Default zoom if no localities

        return localities[0].type === "city" ? 8 : 11;
    }, [localities]);

    return (
        <>
            {polygon_centroid && <MapContainer
                center={invertCoordinates(polygon_centroid.coordinates)}
                zoom={zoom}
                scrollWheelZoom={true}
                ref={setMap}
                style={{ height: "450px", width: "100%" }}
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