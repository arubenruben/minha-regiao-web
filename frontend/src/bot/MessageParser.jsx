import React from 'react';
import { sendRequest } from '../utils';

const MessageParser = ({ children, actions }) => {
    const parse = (message) => {

        sendRequest(`${process.env.REACT_APP_ENDPOINT}/llm/`, "POST", {
            'data': children.props.state.data,
            'query': message,
        }).then((response) => {
            actions.handleHello(response);
        }).catch((error) => {
            console.error('Error:', error);
        });
    };

    return (
        <div>
            {React.Children.map(children, (child) => {
                return React.cloneElement(child, {
                    parse: parse,
                    actions: {},
                });
            })}
        </div>
    );
};

export default MessageParser;