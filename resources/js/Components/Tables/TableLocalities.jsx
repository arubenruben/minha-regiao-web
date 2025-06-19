import React, { useMemo } from 'react';
import Table from '@mui/material/Table';
import TableBody from '@mui/material/TableBody';
import TableCell from '@mui/material/TableCell';
import TableHead from '@mui/material/TableHead';
import TableRow from '@mui/material/TableRow';
import TableContainer from '@mui/material/TableContainer';
import { Link } from '@inertiajs/react';

const TableLocalities = ({ localities, selectedElectionYear, type }) => {
    const elections = useMemo(() => {
        if (!localities || !selectedElectionYear) return [];

        return localities.flatMap((local) =>
            local.elections
                .filter((election) => election.year === selectedElectionYear)
                .map((election) => ({ ...election, local }))
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
                    {elections.map((election, index) => {
                        let link;

                        if (type === 'city') {
                            link = <Link href={route("cities.show", { city: election.local.name })} className="link-table">{election.local.name}</Link>;
                        } else if (type === 'parish') {
                            link = <Link href={route("parishes.show", { freguesias_pt_entry_id: election.local.freguesias_pt_entry_id })} className="link-table">{election.local.name}</Link>;
                        }

                        return (
                            <TableRow key={index}>
                                <TableCell component="th" scope="row">
                                    {link}
                                </TableCell>
                                <TableCell align="right">{election.winner.party.acronym}</TableCell>
                                <TableCell align="right">{election.winner.candidate?.name ?? "-"}</TableCell>
                                <TableCell align="right">{parseFloat(election.winner.percentage_votes).toFixed(2)}</TableCell>
                            </TableRow>
                        )
                    })}
                </TableBody>
            </Table>
        </TableContainer>
    );
};

export default TableLocalities;
