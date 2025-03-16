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

export const fetchCity = async (cityName = null, districtName = null) => {
    if (!cityName && !districtName) {
        throw new Error('At least one parameter (cityName or districtName) must be provided');
    }

    let url = `${process.env.REACT_APP_ENDPOINT}/cities/`;
    const params = [];

    if (cityName) params.push(`name=${cityName}`);
    if (districtName) params.push(`district=${districtName}`);

    url += params.length ? `?${params.join('&')}` : '';

    return await sendRequest(url, 'GET');
}

export const fetchMunicipality = async (municipalityName = null, cityName = null) => {
    if (!municipalityName && !cityName) {
        throw new Error('At least one parameter (municipalityName or cityName) must be provided');
    }

    let url = `${process.env.REACT_APP_ENDPOINT}/municipalities/`;
    const params = [];

    if (municipalityName) params.push(`name=${municipalityName}`);
    if (cityName) params.push(`city=${cityName}`);

    url += params.length ? `?${params.join('&')}` : '';

    return await sendRequest(url, 'GET');
}

export const averageLocalElections = (local) => {

    if (!local)
        return [];

    const parties = ['PS', 'PPD/PSD', 'PCP-PEV', 'B.E.'];

    const results = [];

    //Obtain the existing years
    const years = local.map((city) => city.elections.map((election) => election.year)).flat();
    const uniqueYears = [...new Set(years)];


    for (const year of uniqueYears) {

        const accumulator = {}

        const localElections = local.map((city) => city.elections.find((election) => election.year === year)).filter((election) => election !== undefined);

        for (const party of parties) {

            accumulator[party] = 0;

            for (const cityElections of localElections) {
                for (const result of cityElections.results) {
                    if (result.party === party)
                        accumulator[party] += (result.votes / cityElections.number_voters) * 100;
                }
            }

            accumulator[party] /= localElections.length;
        }

        results.push({
            year: year,
            results: accumulator
        });
    }

    return results;
}