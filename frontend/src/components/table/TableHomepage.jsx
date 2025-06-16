import React, { useState } from 'react'
import Table from '@mui/material/Table';
import TableBody from '@mui/material/TableBody';
import TableCell from '@mui/material/TableCell';
import TableHead from '@mui/material/TableHead';
import TableRow from '@mui/material/TableRow';

const TableHomepage = (props) => {
    const [parties, setParties] = useState([]);

    const calculateElectionSummary = (districts) => {
        // Create a list of dicts where each dict.party is a party from props.parties        
        const results = {}

        // Loop through each election summary and add the number of votes to the party in results
        for (let i = 0; i < districts.length; i++) {
            const district = districts[i]

            for (let j = 0; j < district.election_summaries.length; j++) {
                const election_summary = district.election_summaries[j]

                if (election_summary.winner_election_result.party in results) {
                    results[election_summary.winner_election_result.party] += 1
                }
                else {
                    results[election_summary.winner_election_result.party] = 1
                }

            }
        }
        // Remove parties with 0 votes from results
        for (const party in results) {
            if (results[party] == 0) {
                delete results[party]
            }
        }
        // Sort the results by number of votes
        const sortedResults = Object.entries(results).sort((a, b) => b[1] - a[1]);
        // Create a list of dicts where each dict.party is a party from props.parties

        return sortedResults.map((party) => {
            return {
                name: party[0],
                numberCities: party[1],
            }
        })
    }

    const electionSummary = calculateElectionSummary(props.electionSummary);


    return (
        <Table stickyHeader>
            <TableHead>
                <TableRow>
                    <TableCell>Partido</TableCell>
                    <TableCell align="right">Número de Câmaras Municipais</TableCell>
                </TableRow>
            </TableHead>
            <TableBody>
                {electionSummary?.map((row, index) => (
                    <TableRow key={index}>
                        <TableCell component="th" scope="row">
                            {row.name}
                        </TableCell>
                        <TableCell align="right">{row.numberCities}</TableCell>
                    </TableRow>
                ))}

            </TableBody>
        </Table>
    )
}

export default TableHomepage
