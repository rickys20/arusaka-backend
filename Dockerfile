FROM php:8.1-fpm-alpine

<<<<<<< HEAD
RUN apk add --no-cache nginx wget
=======
RUN apk add --no-cache nginx wget \
    && docker-php-ext-install pdo pdo_mysql
>>>>>>> d2ee64fbf1820acdbe1c8307ed35f462ffad31f1

RUN mkdir -p /run/nginx

COPY docker/nginx.conf /etc/nginx/nginx.conf

RUN mkdir -p /app
COPY . /app
COPY ./src /app
COPY ./src/.env /app

RUN sh -c "wget http://getcomposer.org/composer.phar && chmod a+x composer.phar && mv composer.phar /usr/local/bin/composer"
RUN cd /app && \
    /usr/local/bin/composer install

RUN chown -R www-data: /app

CMD sh /app/docker/startup.sh
