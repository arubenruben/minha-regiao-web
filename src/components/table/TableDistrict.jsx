import React, { useEffect, useState } from 'react'
import Table from '@mui/material/Table';
import TableBody from '@mui/material/TableBody';
import TableCell from '@mui/material/TableCell';
import TableHead from '@mui/material/TableHead';
import TableRow from '@mui/material/TableRow';
import OpenInNewIcon from '@mui/icons-material/OpenInNew';

function createData(name, calories, fat, carbs, protein) {
    return { name, calories, fat, carbs, protein };
}
const rows = [
    createData('Frozen yoghurt', 159, 6.0, 24, 4.0),
    createData('Ice cream sandwich', 237, 9.0, 37, 4.3),
    createData('Eclair', 262, 16.0, 24, 6.0),
    createData('Cupcake', 305, 3.7, 67, 4.3),
    createData('Gingerbread', 356, 16.0, 49, 3.9),
];
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

        const winnerResult = flattenedElections.map((election) => {
            const electionResults = election.election_results;
            if (electionResults && electionResults.length > 0) {
                // Sort the election results by number of votes in descending order
                const sortedResults = electionResults.sort((a, b) => b.votes - a.votes);
                // Return the party with the highest number of votes
                return sortedResults[0];
            }
            return null; // or some default value
        });

        const totalVotes = flattenedElections.map((election) => {
            const electionResults = election.election_results;
            if (electionResults && electionResults.length > 0) {
                // Calculate the total number of votes
                return electionResults.reduce((total, result) => total + result.votes, 0);
            }
            return null; // or some default value
        });

        // Create a new array of objects with the desired structure
        const newElections = flattenedElections.map((election, index) => {
            return {
                city: props.cities[index],
                election: election,
                winnerPresident: "John Doe",
                winnerParty: winnerResult?.party,
                winnerPercentage: Math.round((winnerResult.votes / totalVotes) * 100, 2) ? winnerResult && winnerResult.votes : null,
            };
        });

        setElections(newElections);


    }, [props.cities, props.selectedElectionYear]);

    console.log(elections);

    return (
        <Table>
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
                        <TableCell align="right">{election.winnerParty}</TableCell>
                        <TableCell align="right">{election.winnerPresident}</TableCell>
                        <TableCell align="right">{election.winnerPercentage}</TableCell>
                        <TableCell align="right"><OpenInNewIcon /></TableCell>
                    </TableRow>
                ))}
            </TableBody>

        </Table>
    )
}

export default TableDistrict
