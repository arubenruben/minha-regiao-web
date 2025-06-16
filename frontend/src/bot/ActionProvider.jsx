import React from 'react';

const ActionProvider = ({ createChatBotMessage, setState, children }) => {
    const handleHello = (response) => {
        
        setState((prev) => ({
            ...prev,
            messages: [...prev.messages, createChatBotMessage(response)],
        }));
    };

    return (
        <div>
            {React.Children.map(children, (child) => {
                return React.cloneElement(child, {
                    actions: { handleHello },
                });
            })}
        </div>
    );
};

export default ActionProvider;