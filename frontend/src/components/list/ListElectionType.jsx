import React from 'react'
import List from '@mui/material/List';
import ListItemButton from '@mui/material/ListItemButton';
import ListItemText from '@mui/material/ListItemText';
import ListItemAvatar from '@mui/material/ListItemAvatar';
import Avatar from '@mui/material/Avatar';
import PlaceIcon from '@mui/icons-material/Place';
import GavelIcon from '@mui/icons-material/Gavel';
import FrontHandIcon from '@mui/icons-material/FrontHand';

const ListElectionType = (props) => {
    return (
        <List id="list-election-type">
            <ListItemButton onClick={() => props.setSelectedFilter("promises")}>
                <ListItemAvatar>
                    <Avatar>
                        <FrontHandIcon />
                    </Avatar>
                </ListItemAvatar>
                <ListItemText>
                    Promessas Eleitorais
                </ListItemText>
            </ListItemButton>
            <ListItemButton onClick={() => props.setSelectedFilter("name")}>
                <ListItemAvatar>
                    <Avatar>
                        <PlaceIcon />
                    </Avatar>
                </ListItemAvatar>
                <ListItemText>
                    Nome da Região
                </ListItemText>
            </ListItemButton>
            <ListItemButton onClick={() => props.setSelectedFilter("president")}>
                <ListItemAvatar>
                    <Avatar>
                        <GavelIcon />
                    </Avatar>
                </ListItemAvatar>
                <ListItemText>
                    Nome do Presidente
                </ListItemText>
            </ListItemButton>
        </List>
    )
}

export default ListElectionType
