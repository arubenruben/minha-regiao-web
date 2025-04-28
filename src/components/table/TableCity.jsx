import React, { useEffect, useState } from 'react';
import Table from '@mui/material/Table';
import TableBody from '@mui/material/TableBody';
import TableCell from '@mui/material/TableCell';
import TableHead from '@mui/material/TableHead';
import TableRow from '@mui/material/TableRow';
import OpenInNewIcon from '@mui/icons-material/OpenInNew';
import { Link } from 'react-router-dom';

const TableCity = (props) => {
    const [elections, setElections] = useState([]);

    useEffect(() => {
        if (!props.municipalities || !props.selectedElectionYear) return;

        // Filter the elections based on the selected election year
        const filteredElections = props.municipalities?.map((city) => {
            return city.elections.filter((election) => election.year === props.selectedElectionYear);
        }).flat();

        // Process elections data using map and reduce instead of for loops
        const newElections = filteredElections.map((election, i) => {
            // Use reduce to find both totalVotes and winner in a single pass
            const { totalVotes, winner } = election.election_results.reduce(
                (acc, result) => {
                    const newTotal = acc.totalVotes + result.number_votes;
                    const newWinner = !acc.winner || result.number_votes > acc.winner.number_votes ? result : acc.winner;
                    return { totalVotes: newTotal, winner: newWinner };
                },
                { totalVotes: 0, winner: null }
            );


            return {
                municipality: props.municipalities[i],
                election,
                winner: winner,
                totalVotes,
            };
        });

        // Sort newElections by city name
        setElections(newElections.sort((a, b) => a.municipality.name.localeCompare(b.municipality.name)));
    }, [props.municipalities, props.selectedElectionYear]);

    return (
        <Table size="small" stickyHeader>
            <TableHead>
                <TableRow>
                    <TableCell>Freguesia</TableCell>
                    <TableCell align="center">Partido Vencedor</TableCell>
                    <TableCell align="center">Presidente Eleito</TableCell>
                    <TableCell align="center">% Votos</TableCell>
                    <TableCell align="center"></TableCell>
                </TableRow>
            </TableHead>
            <TableBody>
                {elections.map((election, index) => (
                    <TableRow key={index}>
                        <TableCell component="th" scope="row">
                            {election.municipality.name}
                        </TableCell>
                        <TableCell align="right">{election.winner.party}</TableCell>
                        <TableCell align="center">{election.election.president?.name ?? '-'}</TableCell>
                        <TableCell align="center">{(election.winner.number_votes / election.totalVotes * 100).toFixed(2)}</TableCell>
                        <TableCell align="center">
                            <Link to={`/freguesia/${election.municipality.name}`}>
                                <OpenInNewIcon />
                            </Link>
                        </TableCell>
                    </TableRow>
                ))}
            </TableBody>
        </Table>
    )
}

export default TableCity