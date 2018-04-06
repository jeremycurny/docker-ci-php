FROM php:7.1-cli

MAINTAINER "Jeremy CURNY" <jeremy.curny.pro@gmail.com>

ARG DEBIAN_FRONTEND=noninteractive

RUN  \
    apt-get update \
    && apt-get install -y graphviz git sshpass unzip zip \
    && apt-get clean autoclean \
    && apt-get autoremove

RUN \
    curl -sL -o /usr/local/bin/composer https://getcomposer.org/composer.phar \
    && chmod +x /usr/local/bin/composer

RUN \
    pecl install xdebug
    
RUN \
    docker-php-ext-enable xdebug \
    && docker-php-ext-install xsl
    
RUN \
    mkdir -p /root/.ssh \
    && chmod 700 /root/.ssh \
    && echo "" > /root/.ssh/known_hosts
