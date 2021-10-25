FROM node:15-alpine as node
WORKDIR /usr/src/app
COPY certificados-alunos-frontend/ .
RUN npm install -g npm@7.5.6
RUN npm install
RUN npm run build -- --prod

FROM php:7.4-fpm
COPY --from=node /usr/src/app/dist/certificados-alunos-frontend public
COPY --from=node /usr/src/app/dist/certificados-alunos-frontend/index.html resources/views/angular.blade.php
COPY certificados-alunos-backend/ .
RUN apt-get update
RUN apt-get install -y libpq-dev zip git
RUN docker-php-ext-install pdo_pgsql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install
RUN apt-get clean 
ARG port=9000
ENV PORT=$port
CMD php -S 0.0.0.0:$PORT -t public

EXPOSE 9000