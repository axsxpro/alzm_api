FROM php:8.2.4-apache

# Installer les dépendances et les extensions PHP nécessaires
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libpq-dev \
    && docker-php-ext-install intl pdo_pgsql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
   mv composer.phar /usr/local/bin/composer

RUN docker-php-ext-configure intl

RUN pecl install apcu && docker-php-ext-enable apcu

RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql

WORKDIR /var/www