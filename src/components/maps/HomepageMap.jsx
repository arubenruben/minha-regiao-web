import React, { useState, useCallback, useMemo } from 'react';
import { MapContainer, TileLayer, Polygon, Popup } from 'react-leaflet';
import { invertCoordinates } from '../../utils';

const HomepageMap = ({ districts }) => {
    const [map, setMap] = useState(null);
    const [popupPosition, setPopupPosition] = useState(null);
    const [selectedDistrictId, setSelectedDistrictId] = useState(null);

    const center = [39.6496747, -8.2081579];
    const zoom = 7;

    const handlePolygonClick = useCallback((districtId, latlng) => {
        setSelectedDistrictId(districtId);
        setPopupPosition(latlng);

        if (map) {
            map.flyTo(latlng, map.getZoom());
        }
    }, [map]);

    const renderPolygons = useMemo(() => {
        if (!districts || !districts.length) return null;

        return districts.map(district => {
            const coordinates = invertCoordinates(district.geo_polygon.coordinates);

            return (
                <Polygon
                    key={district.id}
                    positions={coordinates}
                    pathOptions={{ color: 'purple' }}
                    eventHandlers={{
                        click: (e) => handlePolygonClick(district.name, e.latlng)
                    }}
                />
            );
        });
    }, [districts, handlePolygonClick]);

    const renderPopup = () => {
        if (!popupPosition || !selectedDistrictId) return null;

        return (
            <Popup position={popupPosition} onClose={() => setPopupPosition(null)}>
                <div>
                    <a href={`/distrito/${selectedDistrictId}`} rel="noopener noreferrer">
                        Obter mais informação sobre {selectedDistrictId}
                    </a>
                </div>
            </Popup>
        );
    };

    return (
        <div className="map-container">
            <MapContainer
                center={center}
                zoom={zoom}
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
            </MapContainer>
        </div>
    );
};

export default HomepageMap;