import React, { useMemo } from 'react';
import Table from '@mui/material/Table';
import TableBody from '@mui/material/TableBody';
import TableCell from '@mui/material/TableCell';
import TableHead from '@mui/material/TableHead';
import TableRow from '@mui/material/TableRow';
import TableContainer from '@mui/material/TableContainer';
import { Link } from '@inertiajs/react';

const TableLocalities = ({ localities, selectedElectionYear }) => {
    const elections = useMemo(() => {
        if (!localities || !selectedElectionYear) return [];

        return localities.flatMap((city) =>
            city.elections
                .filter((election) => election.year === selectedElectionYear)
                .map((election) => ({ city, election }))
        );
    }, [localities, selectedElectionYear]);

    return (
        <TableContainer sx={{ maxHeight: 350 }}>
            <Table size="small" stickyHeader>
                <TableHead>
                    <TableRow>
                        <TableCell>Concelho</TableCell>
                        <TableCell align="right">Partido Vencedor</TableCell>
                        <TableCell align="right">Presidente Eleito</TableCell>
                        <TableCell align="right">% Votos</TableCell>
                    </TableRow>
                </TableHead>
                <TableBody>
                    {elections.map((election, index) => (
                        <TableRow key={index}>
                            <TableCell component="th" scope="row">
                                <Link href={route('cities.show', { city: election.city.name })} className="link-table">
                                    {election.city.name}
                                </Link>
                            </TableCell>
                            <TableCell align="right">{election.election.winner.party.acronym}</TableCell>
                            <TableCell align="right">{election.election.winner.candidate.name ?? "-"}</TableCell>
                            <TableCell align="right">{parseFloat(election.election.winner.percentage_votes).toFixed(2)}</TableCell>
                        </TableRow>
                    ))}
                </TableBody>
            </Table>
        </TableContainer>
    );
};

export default TableLocalities;
