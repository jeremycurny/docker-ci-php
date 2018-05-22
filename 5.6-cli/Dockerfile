FROM php:5.6-cli

MAINTAINER "Jeremy CURNY" <jeremy.curny.pro@gmail.com>

ARG DEBIAN_FRONTEND=noninteractive

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV MAGENTO2_PUB 6c7c3956d991c6459bcbf6d0d977514f
ENV MAGENTO2_PRI 2319f30adac6169a5c30ad2cb564d177

RUN  \
    curl -sL https://deb.nodesource.com/setup_8.x | bash \
    && apt-get install -y \
        gettext graphviz git nano nodejs python python3 python-pip python3-pip sshpass unzip zip \
        libfreetype6-dev libicu-dev libjpeg62-turbo-dev libmcrypt-dev libpng12-dev libxslt-dev \
        python-dev python3-dev \
    && apt-get clean autoclean \
    && apt-get autoremove

RUN \
    pip install awscli

RUN \
    curl -sL -o /usr/local/bin/composer https://getcomposer.org/composer.phar \
    && chmod +x /usr/local/bin/composer \
    && echo "memory_limit=512M" > /usr/local/etc/php/conf.d/php.ini \
    && echo "phar.readonly=Off" >> /usr/local/etc/php/conf.d/php.ini

RUN \
    pecl install redis xdebug-2.5.5 \
    && docker-php-ext-enable redis xdebug \
    && docker-php-ext-install bcmath gd iconv intl mcrypt pdo_mysql soap xsl zip

RUN \
    composer global require squizlabs/php_codesniffer \
    && composer global require phpmd/phpmd \
    && composer global require sebastian/phpcpd \
    && composer global require phpmetrics/phpmetrics \
    && composer global config --auth http-basic.repo.magento.com $MAGENTO2_PUB $MAGENTO2_PRI \
    && composer create-project --repository=https://repo.magento.com magento/marketplace-eqp ~/marketplace-eqp \
    && curl -sL -o ~/phpda https://raw.github.com/mamuz/PhpDependencyAnalysis/master/download/phpda.pubkey \
    && curl -sL -o ~/phpda https://raw.github.com/mamuz/PhpDependencyAnalysis/master/download/phpda \
    && chmod +x ~/phpda

RUN \
    npm install -g bower eslint gulp grunt jshint jslint semistandard standard

RUN \
    mkdir -p /root/.ssh \
    && chmod 700 /root/.ssh \
    && echo "" > /root/.ssh/known_hosts
