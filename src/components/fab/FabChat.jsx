import React from 'react'
import Fab from '@mui/material/Fab';
import VoiceChatIcon from '@mui/icons-material/VoiceChat';

const FabChat = (props) => {
    return (
        <Fab id="fab-chat" color="primary" variant="extended" onClick={() => { props.setChatBot(!props.chatBot) }} >
            <VoiceChatIcon sx={{ mr: 1 }} />Falamos?
        </Fab>
    )
}

export default FabChat
