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
            map.flyTo(latlng, Math.max(map.getZoom(), 10));
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

    const renderPopup = () => {
        if (!popupPosition || !selectedDistrictId) return null;

        return (
            <Popup position={popupPosition} onClose={() => setPopupPosition(null)}>
                <div>
                    <a href={`/${endpoint}/${selectedDistrictId}`} rel="noopener noreferrer">
                        Obter mais informação sobre {selectedDistrictId}
                    </a>
                </div>
            </Popup>
        );
    };
    console.log(polygon_centroid);

    return (
        <div className="map-container">
            {polygon_centroid && <MapContainer
                center={invertCoordinates(polygon_centroid.coordinates)}
                zoom={10}
                scrollWheelZoom={true}
                ref={setMap}
                style={{ height: '100vh', width: '100%' }}
            >
                <TileLayer
                    attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
                />
                {renderPolygons}
                {renderPopup()}
            </MapContainer>}
        </div>
    )
}

export default LocalMap
