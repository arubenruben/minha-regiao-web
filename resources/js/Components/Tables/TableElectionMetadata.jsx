import React from 'react'
import Table from '@mui/material/Table';
import TableBody from '@mui/material/TableBody';
import TableCell from '@mui/material/TableCell';
import TableHead from '@mui/material/TableHead';
import TableRow from '@mui/material/TableRow';

const TableElectionMetadata = ({ election, yearToCompare }) => {
    const electionToCompare = React.useMemo(() => {
        if (!yearToCompare || !election)
            return null;
        return election.other_elections.find(e => e.year === yearToCompare) || null;
    }, [yearToCompare, election]);

    return (
        <Table>
            {!electionToCompare && <caption>Detalhes da Eleição de {election?.year}</caption>}
            {electionToCompare && <caption>Comparação das Eleições de {election?.year} e {electionToCompare?.year}</caption>}
            <TableHead>
                <TableRow>
                    <TableCell>Ano</TableCell>
                    <TableCell sx={{ display: { xs: "none", md: "table-cell" } }}>Eleitores</TableCell>
                    <TableCell sx={{ display: { xs: "none", md: "table-cell" } }}>Votos</TableCell>
                    <TableCell>% Abstenção</TableCell>
                    <TableCell>% Brancos</TableCell>
                    <TableCell>% Nulos</TableCell>
                </TableRow>
            </TableHead>
            <TableBody>
                {election && <TableRow>
                    <TableCell>{election.year}</TableCell>
                    <TableCell sx={{ display: { xs: "none", md: "table-cell" } }}>{election.number_registered_voters}</TableCell>
                    <TableCell sx={{ display: { xs: "none", md: "table-cell" } }}>{election.number_participant_voters}</TableCell>
                    <TableCell>{(election.number_absentee_votes / election.number_registered_voters * 100).toFixed(2)}</TableCell>
                    <TableCell>{(election.number_blank_votes / election.number_registered_voters * 100).toFixed(2)}</TableCell>
                    <TableCell>{(election.number_null_votes / election.number_registered_voters * 100).toFixed(2)}</TableCell>
                </TableRow>}
                {electionToCompare && <TableRow>
                    <TableCell>{electionToCompare.year}</TableCell>
                    <TableCell sx={{ display: { xs: "none", md: "table-cell" } }}>{electionToCompare.number_registered_voters}</TableCell>
                    <TableCell sx={{ display: { xs: "none", md: "table-cell" } }}>{electionToCompare.number_participant_voters}</TableCell>
                    <TableCell>{(electionToCompare.number_absentee_votes / electionToCompare.number_registered_voters * 100).toFixed(2)}</TableCell>
                    <TableCell>{(electionToCompare.number_blank_votes / electionToCompare.number_registered_voters * 100).toFixed(2)}</TableCell>
                    <TableCell>{(electionToCompare.number_null_votes / electionToCompare.number_registered_voters * 100).toFixed(2)}</TableCell>
                </TableRow>}
            </TableBody>
        </Table>
    )
}

export default TableElectionMetadata