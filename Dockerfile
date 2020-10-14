FROM php:7.4-cli
COPY . .
WORKDIR /TP_Docker
CMD [ "php", "index.html" ]