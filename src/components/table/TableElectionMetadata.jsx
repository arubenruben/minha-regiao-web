import React from 'react'
import Table from '@mui/material/Table';
import TableBody from '@mui/material/TableBody';
import TableCell from '@mui/material/TableCell';
import TableHead from '@mui/material/TableHead';
import TableRow from '@mui/material/TableRow';

const TableElectionMetadata = (props) => {
    return (
        <Table>
            <TableHead>
                <TableRow>
                    <TableCell></TableCell>
                    <TableCell>Número de Votos</TableCell>
                    <TableCell>Percetagem</TableCell>
                </TableRow>
            </TableHead>
            <TableBody>
                <TableRow>
                    <TableCell>Abstenção</TableCell>
                    <TableCell>{props.election?.number_voters - props.totalNumberVotes}</TableCell>
                    <TableCell>{(((props.election?.number_voters - props.totalNumberVotes) / props.election?.number_voters) * 100).toFixed(2)}</TableCell>
                </TableRow>
                <TableRow>
                    <TableCell>Votos em Branco</TableCell>
                    <TableCell>{props.election?.number_blank_votes}</TableCell>                
                    <TableCell>{((props.election?.number_blank_votes / props.totalNumberVotes) * 100).toFixed(2)}</TableCell>
                </TableRow>
                <TableRow>
                    <TableCell>Votos Nulos</TableCell>
                    <TableCell>{props.election?.number_null_votes}</TableCell>
                    <TableCell>{((props.election?.number_null_votes / props.totalNumberVotes) * 100).toFixed(2)}</TableCell>
                </TableRow>
            </TableBody>
        </Table>
    )
}

export default TableElectionMetadata
