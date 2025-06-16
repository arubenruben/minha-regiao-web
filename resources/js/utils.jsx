export const invertCoordinates = (coordinates) => {
    if (Array.isArray(coordinates[0])) {
        return coordinates.map(invertCoordinates);
    } else {
        return [coordinates[1], coordinates[0]];
    }
}