FROM composer:latest

WORKDIR /app

COPY ./install.sh ./

RUN chmod +x ./install.sh

ENTRYPOINT [ "./install.sh" ]