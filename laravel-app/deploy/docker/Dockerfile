FROM ubuntu:latest

ENV PHP_VERSION 8.2

RUN ln -snf /usr/share/zoneinfo/Europe/London /etc/localtime && echo Europe/London > /etc/timezone

RUN apt-get update
RUN apt-get install -y software-properties-common curl

RUN LC_ALL=C.UTF-8 apt-add-repository ppa:ondrej/php -y

RUN apt-get update && apt-get install -y \
    php${PHP_VERSION}-mcrypt \
    php${PHP_VERSION}-dom \
    php${PHP_VERSION}-curl \
    php${PHP_VERSION}-cli \
    php${PHP_VERSION}-mbstring \
    php${PHP_VERSION}-mysql \
    php${PHP_VERSION}-redis \
    php${PHP_VERSION}-fpm \
    php${PHP_VERSION}-zip \
    php${PHP_VERSION}-decimal \
    supervisor \
    zip unzip \
    git \
    nano

RUN apt-get autoremove -y
RUN apt-get clean
RUN rm -rf /var/lib/apt/lists/*

RUN apt-get update || (sleep 5 && apt-get update) || (sleep 5 && apt-get update) || apt-get update

RUN mkdir -p /run/php && chmod -R 755 /run/php
RUN mkdir -p /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html
COPY . /var/www/html/

ADD deploy/docker/php/custom.ini /etc/php/${PHP_VERSION}/fpm/conf.d/custom.ini
ADD deploy/docker/php/www.conf /etc/php/${PHP_VERSION}/fpm/pool.d/www.conf
ADD deploy/docker/supervisord/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

RUN composer install

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
