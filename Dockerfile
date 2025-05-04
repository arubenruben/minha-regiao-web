FROM node:23-alpine AS build

WORKDIR /app

COPY package*.json .

RUN npm install

RUN npm install react-bootstrap bootstrap --save-prod

RUN npm install @mui/x-charts --save-prod

RUN npm install react-chatbot-kit --save-prod

COPY .env.production .env

COPY . .

RUN npm run build

# Use a specific version of the official Nginx image as the base image for the deployable image
FROM nginxinc/nginx-unprivileged:1.24-bullseye-perl

# Expose the port that the Nginx server will listen on
EXPOSE 8080

# Copy the built artifacts from the build stage to the Nginx HTML directory
COPY --from=build /app/build /usr/share/nginx/html