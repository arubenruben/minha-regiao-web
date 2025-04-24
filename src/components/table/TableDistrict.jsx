import React, { useEffect, useState } from 'react'
import Table from '@mui/material/Table';
import TableBody from '@mui/material/TableBody';
import TableCell from '@mui/material/TableCell';
import TableHead from '@mui/material/TableHead';
import TableRow from '@mui/material/TableRow';
import OpenInNewIcon from '@mui/icons-material/OpenInNew';

// Sample data function removed as it's not being used
//cities={district?.cities} selectedElectionYear={selectedElectionYear}
const TableDistrict = (props) => {

    const [elections, setElections] = useState([]);

    useEffect(() => {
        if (!props.cities || !props.selectedElectionYear) return;

        // Filter the elections based on the selected election year
        const filteredElections = props.cities?.map((city) => {
            return city.elections.filter((election) => election.year === props.selectedElectionYear);
        });

        // Flatten the array of arrays into a single array
        const flattenedElections = filteredElections.flat();

        // flattenedElections[0] corresponds to the first city
        // flattenedElections[1] corresponds to the second city

        // The winner party is the one with the highest number of votes in election.election_results array
        const newElections = []


        for (let i = 0; i < flattenedElections.length; i++) {
            let winner = null
            let totalVotes = 0

            for (let j = 0; j < flattenedElections[i].election_results.length; j++) {
                const election_result = flattenedElections[i].election_results[j];

                totalVotes += election_result.number_votes;

                if (winner === null || election_result.number_votes > winner.number_votes) {
                    winner = election_result;
                }
            }

            newElections.push({
                city: props.cities[i],
                election: flattenedElections[i],
                winner:
                {
                    ...winner,
                    president: "John Doe", // Placeholder for president name
                },
                totalVotes: totalVotes,
            });
        }

        // Sort newElections by city.name

        newElections.sort((a, b) => a.city.name.localeCompare(b.city.name));

        setElections(newElections);



    }, [props.cities, props.selectedElectionYear]);

    return (
        <Table size="small">
            <TableHead>
                <TableRow>
                    <TableCell>Concelho</TableCell>
                    <TableCell align="right">Partido Vencedor</TableCell>
                    <TableCell align="right">Presidente Eleito</TableCell>
                    <TableCell align="right">% Votos</TableCell>
                    <TableCell align="right"></TableCell>
                </TableRow>
            </TableHead>
            <TableBody>
                {elections.map((election, index) => (
                    <TableRow key={index}>
                        <TableCell component="th" scope="row">
                            {election.city.name}
                        </TableCell>
                        <TableCell align="right">{election.winner.party}</TableCell>
                        <TableCell align="right">{election.winner.president}</TableCell>
                        <TableCell align="right">{(election.winner.number_votes / election.totalVotes * 100).toFixed(2)}</TableCell>
                        <TableCell align="right"><OpenInNewIcon /></TableCell>
                    </TableRow>
                ))}
            </TableBody>

        </Table>
    )
}

export default TableDistrict
