import React, { useState, useEffect } from 'react'
import Table from '@mui/material/Table';
import TableBody from '@mui/material/TableBody';
import TableCell from '@mui/material/TableCell';
import TableHead from '@mui/material/TableHead';
import TableRow from '@mui/material/TableRow';
import OpenInNewIcon from '@mui/icons-material/OpenInNew';

const TableCityHistoric = ({ elections = [], endpoint, name }) => {
    const [processedElections, setProcessedElections] = useState([]);

    useEffect(() => {
        if (!elections?.length) return;

        const results = elections.map(election => {
            // Find the winner and calculate total votes
            let winner = null;
            let totalVotes = 0;

            election.election_results.forEach(result => {
                totalVotes += result.number_votes;
                if (!winner || result.number_votes > winner.number_votes) {
                    winner = result;
                }
            });

            return { election, winner, totalVotes };
        });

        // Sort by year descending
        setProcessedElections(results.sort((a, b) => b.election.year - a.election.year));
    }, [elections]);

    return (
        <Table size="small" stickyHeader>
            <TableHead>
                <TableRow>
                    <TableCell>Ano</TableCell>
                    <TableCell align="right">Partido Vencedor</TableCell>
                    <TableCell align="right">Presidente Eleito</TableCell>
                    <TableCell align="right">% Votos</TableCell>
                    <TableCell align="center">Detalhes da Eleição</TableCell>
                </TableRow>
            </TableHead>
            <TableBody>
                {processedElections.map((elem, index) => {
                    const totalWithBlankAndNull = elem.totalVotes +
                        elem.election.number_blank_votes +
                        elem.election.number_null_votes;

                    const votePercentage = ((elem.winner.number_votes / totalWithBlankAndNull) * 100).toFixed(2);

                    return (
                        <TableRow
                            key={index}
                            hover
                            sx={{
                                cursor: 'pointer',
                                '&:hover': { backgroundColor: 'rgba(0, 0, 0, 0.04)' }
                            }}
                            onClick={() => {
                                window.location.href = `/eleicao/${endpoint}/${name}/${elem.election.year}`;
                            }}
                        >
                            <TableCell className="link-table">{elem.election.year}</TableCell>
                            <TableCell align="right">{elem.winner.party}</TableCell>
                            <TableCell align="right">{elem.election.president?.name ?? "-"}</TableCell>
                            <TableCell align="right">{votePercentage}%</TableCell>
                            <TableCell align="center">
                                <OpenInNewIcon />
                            </TableCell>
                        </TableRow>
                    );
                })}
            </TableBody>
        </Table>
    );
};

export default TableCityHistoric;
