FROM node:latest

WORKDIR /app

# Update npm to the latest version
RUN npm install -g npm@latest

RUN npm config set loglevel verbose

COPY package.json .

RUN npm install

RUN npm install react-bootstrap bootstrap

RUN npm install @mui/x-charts@next

RUN npm install @mui/material @emotion/react @emotion/styled

COPY . .

EXPOSE 3000

ENTRYPOINT [ "npm", "start" ]