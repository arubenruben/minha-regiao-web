import React from 'react'
import Table from '@mui/material/Table';
import TableBody from '@mui/material/TableBody';
import TableCell from '@mui/material/TableCell';
import TableHead from '@mui/material/TableHead';
import TableRow from '@mui/material/TableRow';

const TableElectionMetadata = (props) => {
    console.log(props);

    return (
        <Table stickyHeader>
            {!props.electionToCompare && <caption>Detalhes da Eleição de {props.election.year}</caption>}
            {props.electionToCompare && <caption>Comparação das Eleições de {props.election.year} e {props.electionToCompare.year}</caption>}
            <TableHead>
                <TableRow>
                    <TableCell>Ano</TableCell>
                    <TableCell>Eleitores Registados</TableCell>
                    <TableCell>Número de Votos</TableCell>
                    <TableCell>% Abstenção</TableCell>
                    <TableCell>% Brancos</TableCell>
                    <TableCell>% Nulos</TableCell>
                </TableRow>
            </TableHead>
            <TableBody>
                {props.election && <TableRow>
                    <TableCell>{props.election.year}</TableCell>
                    <TableCell>{props.election.number_registered_voters}</TableCell>
                    <TableCell>{props.election.number_participant_voters}</TableCell>
                    <TableCell>{(props.election.number_absentee_votes / props.election.number_registered_voters * 100).toFixed(2)}</TableCell>
                    <TableCell>{(props.election.number_blank_votes / props.election.number_registered_voters * 100).toFixed(2)}</TableCell>
                    <TableCell>{(props.election.number_null_votes / props.election.number_registered_voters * 100).toFixed(2)}</TableCell>
                </TableRow>}
                {props.electionToCompare && <TableRow>
                    <TableCell>{props.electionToCompare.year}</TableCell>
                    <TableCell>{props.electionToCompare.number_registered_voters}</TableCell>
                    <TableCell>{props.electionToCompare.number_participant_voters}</TableCell>
                    <TableCell>{(props.electionToCompare.number_absentee_votes / props.electionToCompare.number_registered_voters * 100).toFixed(2)}</TableCell>
                    <TableCell>{(props.electionToCompare.number_blank_votes / props.electionToCompare.number_registered_voters * 100).toFixed(2)}</TableCell>
                    <TableCell>{(props.electionToCompare.number_null_votes / props.electionToCompare.number_registered_voters * 100).toFixed(2)}</TableCell>
                </TableRow>}
            </TableBody>
        </Table>
    )
}

export default TableElectionMetadata
