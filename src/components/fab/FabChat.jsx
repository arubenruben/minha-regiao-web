import React from 'react'
import Fab from '@mui/material/Fab';
import AddIcon from '@mui/icons-material/Add';
import VoiceChatIcon from '@mui/icons-material/VoiceChat';

const FabChat = () => {
    return (
        <Fab id="fab-chat" color="primary" variant="extended" aria-label="add">
            <VoiceChatIcon sx={{ mr: 1 }} />Falamos?
        </Fab>
    )
}

export default FabChat
