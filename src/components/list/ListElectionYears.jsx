import React from 'react'
import List from '@mui/material/List';
import ListItem from '@mui/material/ListItem';
import ListItemButton from '@mui/material/ListItemButton';

const ListElectionYears = (props) => {
    return (
        <List id="list-election-years">
            {props.electionYears?.map((elem, index) => (
                <ListItem key={index}>
                    <ListItemButton selected={props.comparableElection == elem} onClick={() => props.setComparableElection(elem)}>
                        {elem}                        
                    </ListItemButton>
                </ListItem>
            ))}
        </List>
    )
}

export default ListElectionYears
