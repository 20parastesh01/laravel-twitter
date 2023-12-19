FROM ubuntu:latest

ENV PHP_VERSION 8.2

RUN apt-get update
RUN apt-get install -y software-properties-common curl

RUN LC_ALL=C.UTF-8 apt-add-repository ppa:ondrej/php -y

RUN apt-get update && apt-get install -y \
    php${PHP_VERSION} \
    php${PHP_VERSION}-curl \
    php${PHP_VERSION}-mysql \
    git

RUN apt-get autoremove -y
RUN apt-get clean
RUN rm -rf /var/lib/apt/lists/*

RUN apt-get update || (sleep 5 && apt-get update) || (sleep 5 && apt-get update) || apt-get update

RUN mkdir -p /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html
COPY . /var/www/html/

RUN composer install

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
