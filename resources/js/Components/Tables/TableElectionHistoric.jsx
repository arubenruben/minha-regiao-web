import React, { useState, useEffect } from 'react'
import Table from '@mui/material/Table';
import TableBody from '@mui/material/TableBody';
import TableCell from '@mui/material/TableCell';
import TableHead from '@mui/material/TableHead';
import TableRow from '@mui/material/TableRow';
import OpenInNewIcon from '@mui/icons-material/OpenInNew';
import { Link } from '@inertiajs/react';

const TableElectionHistoric = ({ elections }) => {
    return (
        <Table size="small" stickyHeader>
            <TableHead>
                <TableRow>
                    <TableCell>Ano</TableCell>
                    <TableCell align="right">Partido Vencedor</TableCell>
                    <TableCell align="right">Presidente Eleito</TableCell>
                    <TableCell align="right">Votos</TableCell>
                    <TableCell align="center" sx={{ display: { xs: "None", md: "table-cell" } }}>Detalhes da Eleição</TableCell>
                </TableRow>
            </TableHead>
            <TableBody>
                {elections.map((election, index) => {
                    return (
                        <TableRow
                            key={index}
                            hover
                            sx={{
                                cursor: 'pointer',
                                '&:hover': { backgroundColor: 'rgba(0, 0, 0, 0.04)' }
                            }}
                        >
                            <TableCell className="link-table">
                                <Link href={route("elections.show", { election_id: election.id })}>
                                    {election.year}
                                </Link>
                            </TableCell>
                            <TableCell align="right">{election.winner.party.acronym}</TableCell>
                            <TableCell align="right">{election.winner.candidate?.name ?? "-"}</TableCell>
                            <TableCell align="right">{parseFloat(election.winner.percentage_votes).toFixed(2)}%</TableCell>
                            <TableCell align="center" sx={{ display: { xs: "none", md: "table-cell" } }}>
                                <Link href={route("elections.show", { election_id: election.id })}>
                                    <OpenInNewIcon />
                                </Link>
                            </TableCell>
                        </TableRow>
                    );
                })}
            </TableBody>
        </Table>
    );
};

export default TableElectionHistoric;