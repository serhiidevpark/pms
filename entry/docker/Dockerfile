FROM php:8.0-fpm

ENV PHP_XDEBUG_CLIENT_HOST ${PHP_XDEBUG_CLIENT_HOST:-"host.docker.internal"}
ENV PHP_XDEBUG_CLIENT_PORT ${PHP_XDEBUG_CLIENT_PORT:-9003}
ENV PHP_XDEBUG_START_WITH_REQUEST ${PHP_XDEBUG_START_WITH_REQUEST:-"yes"}
ENV PHP_XDEBUG_MODE ${PHP_XDEBUG_MODE:-"debug"}
ENV PHP_XDEBUG_OUTPUT_DIR ${PHP_XDEBUG_OUTPUT_DIR:-"/tmp"}
ENV PHP_XDEBUG_IDEKEY ${PHP_XDEBUG_IDEKEY:-docker}

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libpq-dev \
    libzip-dev \
    libfontconfig1 \
    libxrender1

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo pdo_mysql zip exif pcntl gd

RUN pecl install xdebug-3.1.2 \
    && docker-php-ext-enable xdebug


COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug-dev.ini
COPY memory-limit-php.ini /usr/local/etc/php/conf.d/memory-limit-php.ini

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

USER www

WORKDIR /var/www/html

