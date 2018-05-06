FROM php:7.1-cli

MAINTAINER "Jeremy CURNY" <jeremy.curny.pro@gmail.com>

ARG DEBIAN_FRONTEND=noninteractive

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV MAGENTO2_PUB 6c7c3956d991c6459bcbf6d0d977514f
ENV MAGENTO2_PRI 2319f30adac6169a5c30ad2cb564d177

RUN  \
    apt-get update \
    && curl -sL https://deb.nodesource.com/setup_8.x | bash \
    && apt-get install -y \ 
        graphviz git nodejs sshpass unzip zip \
        libfreetype6-dev libicu-dev libjpeg62-turbo-dev libmcrypt-dev libpng12-dev libxslt-dev \
    && apt-get clean autoclean \
    && apt-get autoremove

RUN \
    curl -sL -o /usr/local/bin/composer https://getcomposer.org/composer.phar \
    && chmod +x /usr/local/bin/composer \
    && echo "memory_limit=512M" > /usr/local/etc/php/conf.d/php.ini \
    && echo "phar.readonly=Off" >> /usr/local/etc/php/conf.d/php.ini

RUN \
    pecl install redis xdebug \
    && docker-php-ext-enable redis xdebug \
    && docker-php-ext-install bcmath gd iconv intl mcrypt pdo_mysql soap xsl zip
    
RUN \
    composer global require squizlabs/php_codesniffer \
    && composer global require phpmd/phpmd \
    && composer global require sebastian/phpcpd \
    && composer global config --auth http-basic.repo.magento.com $MAGENTO2_PUB $MAGENTO2_PRI \
    && composer create-project --repository=https://repo.magento.com magento/marketplace-eqp ~/marketplace-eqp \
    && curl -sL -o /usr/local/bin/validate_m2_package https://raw.githubusercontent.com/magento/marketplace-tools/master/validate_m2_package.php \
    && sed -i '1s/^.*$/#!\/usr\/bin\/env php/' /usr/local/bin/validate_m2_package \
    && chmod +x /usr/local/bin/validate_m2_package \
    && curl -sL -o ~/phpda https://raw.github.com/mamuz/PhpDependencyAnalysis/master/download/phpda.pubkey \
    && curl -sL -o ~/phpda https://raw.github.com/mamuz/PhpDependencyAnalysis/master/download/phpda \
    && chmod +x ~/phpda
    
RUN \
    npm install -g bower gulp grunt jshint

RUN \
    mkdir -p /root/.ssh \
    && chmod 700 /root/.ssh \
    && echo "" > /root/.ssh/known_hosts
