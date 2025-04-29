import React, { useState, useEffect } from 'react'
import Table from '@mui/material/Table';
import TableBody from '@mui/material/TableBody';
import TableCell from '@mui/material/TableCell';
import TableHead from '@mui/material/TableHead';
import TableRow from '@mui/material/TableRow';
import OpenInNewIcon from '@mui/icons-material/OpenInNew';
import { Link } from 'react-router-dom';

const TableCityHistoric = (props) => {
    const [elections, setElections] = useState([]);


    useEffect(() => {

        const results = []


        // For each election. Identify the winner        
        for (let i = 0; i < props.elections?.length; i++) {
            // Find the winner of this election
            let winner = null;

            let totalVotes = 0

            for (let j = 0; j < props.elections[i].election_results.length; j++) {
                const result = props.elections[i].election_results[j];
                totalVotes += result.number_votes;

                if (!winner || result.number_votes > winner.number_votes) {
                    winner = result;
                }
            }

            results.push(
                {
                    election: props.elections[i],
                    winner: winner,
                    totalVotes: totalVotes,
                }
            )
        }
        setElections(results)
    }, [props.elections])

    return (
        <Table size="small" stickyHeader>
            <TableHead>
                <TableRow>
                    <TableCell>Ano</TableCell>
                    <TableCell align="right">Partido Vencedor</TableCell>
                    <TableCell align="right">Presidente Eleito</TableCell>
                    <TableCell align="right">% Votos</TableCell>
                    <TableCell align="right"></TableCell>
                </TableRow>
            </TableHead>
            <TableBody>
                {elections?.map((elem, index) => (
                    <TableRow key={index}>
                        <TableCell component="th" scope="row">
                            {elem.election.year}
                        </TableCell>
                        <TableCell align="right">{elem.winner.party}</TableCell>
                        <TableCell align="right">{elem.election.president?.name ?? "-"}</TableCell>
                        <TableCell align="right">{((elem.winner.number_votes / (elem.totalVotes + elem.election.number_blank_votes + elem.election.number_null_votes)) * 100).toFixed(2)}%</TableCell>
                        <TableCell align="right">
                            <Link to={`/eleicao/${props.endpoint}/${props.name}/${elem.election.year}`}>
                                <OpenInNewIcon />
                            </Link>
                        </TableCell>
                    </TableRow>
                ))}
            </TableBody>
        </Table>
    )
}

export default TableCityHistoric