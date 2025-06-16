import React, { useState, useEffect } from 'react'
import Table from '@mui/material/Table';
import TableBody from '@mui/material/TableBody';
import TableCell from '@mui/material/TableCell';
import TableHead from '@mui/material/TableHead';
import TableRow from '@mui/material/TableRow';

const TableElection = (props) => {
    const [election, setElection] = useState([]);

    useEffect(() => {
        if (!props.election)
            return;

        // Sort election results by number of votes
        const sortedResults = props.election.election_results.sort((a, b) => {
            return b.number_votes - a.number_votes;
        });

        // Map election results to the desired format
        const mappedResults = sortedResults.map((result) => {
            return {
                party: result.party,
                number_votes: result.number_votes,
                percentage: result.percentage
            };
        });

        setElection(mappedResults);
    }
        , [props.election]);

    return (
        <Table>
            <TableHead>
                <TableRow>
                    <TableCell>Partido</TableCell>
                    <TableCell>Votos</TableCell>
                    <TableCell>Percentagem</TableCell>
                </TableRow>
            </TableHead>
            <TableBody>
                {election.map((row, index) => (
                    <TableRow key={index}>
                        <TableCell component="th" scope="row">
                            {row.party}
                        </TableCell>
                        <TableCell>{row.number_votes}</TableCell>
                        <TableCell>{((row.number_votes / props.totalNumberVotes) * 100).toFixed(2)}</TableCell>
                    </TableRow>
                ))}
            </TableBody>
        </Table>
    )
}

export default TableElection