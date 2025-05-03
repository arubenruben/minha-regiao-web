import React, { useState, useEffect } from 'react';
import Table from '@mui/material/Table';
import TableBody from '@mui/material/TableBody';
import TableCell from '@mui/material/TableCell';
import TableHead from '@mui/material/TableHead';
import TableRow from '@mui/material/TableRow';
import TableContainer from '@mui/material/TableContainer';
import { Link } from 'react-router-dom';
import { _constructElections } from '../../utils';

const TableDistrict = (props) => {
    const [elections, setElections] = useState([]);

    useEffect(() => {
        if (props.cities && props.selectedElectionYear) {
            // Filter the elections based on the selected election year
            const filteredElections = props.cities.map((city) => {
                return city.elections.filter((election) => election.year === props.selectedElectionYear);
            }).flat();

            // Process elections data using map and reduce instead of for loops
            const newElections = filteredElections.map((election, i) => _constructElections(props.cities[i], election));

            // Sort newElections by city name
            setElections(newElections.sort((a, b) => a.city.name.localeCompare(b.city.name)));
        }
    }, [props.cities, props.selectedElectionYear]);

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
                                <Link to={`/cidade/${election.city.name}`} className="link-table">
                                    {election.city.name}
                                </Link>
                            </TableCell>
                            <TableCell align="right">{election.winner.party}</TableCell>
                            <TableCell align="right">{election.election.president?.name ?? "-"}</TableCell>
                            <TableCell align="right">{(election.winner.number_votes / election.totalVotes * 100).toFixed(2)}</TableCell>
                        </TableRow>
                    ))}
                </TableBody>
            </Table>
        </TableContainer>
    );
};

export default TableDistrict;
