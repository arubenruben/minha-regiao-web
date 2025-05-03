import { createChatBotMessage } from 'react-chatbot-kit';

const config = {
    initialMessages: [createChatBotMessage(`Olá! Como posso ajudar?`)], // Mensagem inicial do chatbot
    botName: 'RegionalizaBot', // Nome do bot
};

export default config;