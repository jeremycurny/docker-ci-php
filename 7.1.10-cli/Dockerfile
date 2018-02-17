FROM php:7.1.10-cli

MAINTAINER "Jeremy CURNY" <jeremy.curny.pro@gmail.com>

ARG DEBIAN_FRONTEND=noninteractive

RUN \
    apt-get update

RUN  \
    apt-get install -y graphviz git unzip zip \
    && apt-get clean autoclean \
    && apt-get autoremove
    
RUN \
    pecl install xdebug \
    docker-php-ext-enable xdebug

RUN \
    curl -sL -o /usr/local/bin/composer https://getcomposer.org/composer.phar \
    && chmod +x /usr/local/bin/composer
