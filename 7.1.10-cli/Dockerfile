FROM php:7.1.10-cli

MAINTAINER "Jeremy CURNY" <jeremy.curny.pro@gmail.com>

ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update \
    && apt-get install -y graphviz git unzip zip \
    && apt-get clean autoclean \
    && apt-get autoremove

RUN curl -sL -o /usr/local/bin/composer https://getcomposer.org/composer.phar \
    && chmod +x /usr/local/bin/composer
    
RUN pecl install -o -f xdebug &>/dev/null \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini
