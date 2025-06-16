import React from "react";
import Chatbot from "react-chatbot-kit";
import MessageParser from "../../bot/MessageParser";
import ActionProvider from "../../bot/ActionProvider";
import 'react-chatbot-kit/build/main.css';

const Chat = (props) => {
    return (
        <div id="chatbot">
            <Chatbot
                config={props.config}
                messageParser={MessageParser}
                actionProvider={ActionProvider}
            />
        </div>
    )
}

export default Chat
