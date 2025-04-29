import React, { useEffect, useState } from 'react';
import Table from '@mui/material/Table';
import TableBody from '@mui/material/TableBody';
import TableCell from '@mui/material/TableCell';
import TableHead from '@mui/material/TableHead';
import TableRow from '@mui/material/TableRow';
import OpenInNewIcon from '@mui/icons-material/OpenInNew';
import { Link } from 'react-router-dom';

const TableCity = (props) => {
    const [elections, setElections] = useState([]);

    useEffect(() => {
        if (!props.municipalities || !props.selectedElectionYear)
            return;

        const filteredElections = []

        for (let i = 0; i < props.municipalities.length; i++) {
            const municipality = props.municipalities[i];
            const election = municipality.elections.find((election) => election.year === props.selectedElectionYear);

            if (!election)
                continue;


            // TODO: Hotfix to mask bug in the Database that old_municipalities are being taking into consideration            
            if (props.selectedElectionYear < 2012 && municipality.new_municipality === null)
                continue;

            if (props.selectedElectionYear >= 2012 && municipality.new_municipality !== null)
                continue;

            filteredElections.push({
                municipality: municipality,
                election: election,
            });
        }

        // Process elections data using map and reduce instead of for loops
        const newElections = filteredElections.map((elem, i) => {
            // Use reduce to find both totalVotes and winner in a single pass
            const { totalVotes, winner } = elem.election.election_results.reduce(
                (acc, result) => {
                    const newTotal = acc.totalVotes + result.number_votes;
                    const newWinner = !acc.winner || result.number_votes > acc.winner.number_votes ? result : acc.winner;
                    return { totalVotes: newTotal, winner: newWinner };
                },
                { totalVotes: 0, winner: null }
            );

            return {
                municipality: elem.municipality,
                election: elem.election,
                winner: winner,
                totalVotes,
            };
        });

        // Sort newElections by city name
        setElections(newElections.sort((a, b) => a.municipality.name.localeCompare(b.municipality.name)));
    }, [props.municipalities, props.selectedElectionYear]);

    return (
        <Table size="small" stickyHeader>
            <TableHead>
                <TableRow>
                    <TableCell>Freguesia</TableCell>
                    <TableCell align="center">Partido Vencedor</TableCell>
                    <TableCell align="center">Presidente Eleito</TableCell>
                    <TableCell align="center">% Votos</TableCell>
                    <TableCell align="center"></TableCell>
                </TableRow>
            </TableHead>
            <TableBody>
                {elections.map((election, index) => (
                    <TableRow key={index}>
                        <TableCell component="th" scope="row">
                            {election.municipality.name}
                        </TableCell>
                        <TableCell align="right">{election.winner?.party}</TableCell>
                        <TableCell align="center">{election.election.president?.name ?? '-'}</TableCell>
                        <TableCell align="center">{(election.winner?.number_votes / (election.totalVotes + election.number_blank_votes + election.number_null_votes) * 100).toFixed(2)}</TableCell>
                        <TableCell align="center">
                            <Link to={`/freguesia/${election.municipality.name}`}>
                                <OpenInNewIcon />
                            </Link>
                        </TableCell>
                    </TableRow>
                ))}
            </TableBody>
        </Table>
    )
}

export default TableCity