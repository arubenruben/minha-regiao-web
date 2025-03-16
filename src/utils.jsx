export const sendRequest = async (url, method, body) => {
    const response = await fetch(url, {
        method,
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(body) ?? null,
    });

    if (!response.ok) {
        throw new Error('Failed to send request');
    }

    return response.json();
}

export const fetchDistrict = async (districtName) => {
    const district = await sendRequest(
        `${process.env.REACT_APP_ENDPOINT}/districts/?name=${districtName}`,
        'GET'
    );

    return district;
}

export const fetchMunicipality = async (municipalityName) => {
    const municipality = await sendRequest(
        `${process.env.REACT_APP_ENDPOINT}/municipalities/?name=${municipalityName}`,
        'GET'
    );

    return municipality;
}

export const fetchCity = async (cityName) => {
    const city = await sendRequest(
        `${process.env.REACT_APP_ENDPOINT}/cities/?name=${cityName}`,
        'GET'
    );

    return city;
}
