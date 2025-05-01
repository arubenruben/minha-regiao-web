import React from 'react';
import Table from '@mui/material/Table';
import TableBody from '@mui/material/TableBody';
import TableCell from '@mui/material/TableCell';
import TableHead from '@mui/material/TableHead';
import TableRow from '@mui/material/TableRow';
import OpenInNewIcon from '@mui/icons-material/OpenInNew';
import { Link } from 'react-router-dom';

const TableDistrict = (props) => {

    return (
        <Table size="small" stickyHeader>
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
                {props.elections.map((election, index) => (
                    <TableRow key={index}>
                        <TableCell component="th" scope="row">
                            {election.city.name}
                        </TableCell>
                        <TableCell align="right">{election.winner.party}</TableCell>
                        <TableCell align="right">{election.election.president?.name}</TableCell>
                        <TableCell align="right">{(election.winner.number_votes / election.totalVotes * 100).toFixed(2)}</TableCell>
                        <TableCell align="right">
                            <Link to={`/cidade/${election.city.name}`}>
                                <OpenInNewIcon />
                            </Link>
                        </TableCell>
                    </TableRow>
                ))}
            </TableBody>
        </Table>
    );
};

export default TableDistrict;
