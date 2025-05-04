import React, { useEffect, useState } from 'react';
import Table from '@mui/material/Table';
import TableBody from '@mui/material/TableBody';
import TableCell from '@mui/material/TableCell';
import TableHead from '@mui/material/TableHead';
import TableRow from '@mui/material/TableRow';
import TableContainer from '@mui/material/TableContainer';
import { Link } from 'react-router-dom';

const TableCity = ({ municipalities, selectedElectionYear }) => {
    const [elections, setElections] = useState([]);

    useEffect(() => {
        if (!municipalities || !selectedElectionYear) return;

        const processedElections = municipalities
            .filter(municipality => {
                // Find matching election
                const election = municipality.elections.find(e => e.year === selectedElectionYear);
                if (!election) return false;

                // Exclude based on municipality status and year
                if (selectedElectionYear < 2012 && municipality.new_municipality === null) return false;
                if (selectedElectionYear >= 2012 && municipality.new_municipality !== null) return false;

                return true;
            })
            .map(municipality => {
                const election = municipality.elections.find(e => e.year === selectedElectionYear);
                const results = election.election_results;

                // Calculate winner and total votes in one pass
                const { totalVotes, winner } = results.reduce(
                    (acc, result) => ({
                        totalVotes: acc.totalVotes + result.number_votes,
                        winner: !acc.winner || result.number_votes > acc.winner.number_votes ? result : acc.winner
                    }),
                    { totalVotes: 0, winner: null }
                );

                return { municipality, election, winner, totalVotes };
            })
            .sort((a, b) => a.municipality.name.localeCompare(b.municipality.name));

        setElections(processedElections);
    }, [municipalities, selectedElectionYear]);

    return (
        <TableContainer sx={{ maxHeight: 350 }}>
            <Table size="small" stickyHeader>
                <TableHead>
                    <TableRow>
                        <TableCell>Freguesia</TableCell>
                        <TableCell align="center">Partido Vencedor</TableCell>
                        <TableCell align="center">Presidente Eleito</TableCell>
                        <TableCell align="center">% Votos</TableCell>
                    </TableRow>
                </TableHead>
                <TableBody>
                    {elections.map((elem, index) => {

                        return (
                            <TableRow key={index}>
                                <TableCell component="th" scope="row">
                                    <Link to={`/freguesia/${elem.municipality.name}`} className="link-table">
                                        {elem.municipality.name}
                                    </Link>
                                </TableCell>
                                <TableCell align="right">{elem.winner?.party}</TableCell>
                                <TableCell align="center">{elem.election.president?.name ?? '-'}</TableCell>
                                <TableCell align="center">{elem.winner.percentage.toFixed(2)}</TableCell>
                            </TableRow>
                        );
                    })}
                </TableBody>
            </Table>
        </TableContainer>
    );
};

export default TableCity;
