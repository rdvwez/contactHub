FROM php:fpm-stretch
RUN apt-get update \
    && apt-get install -y wget \
    && rm -rf /var/lib/apt/lists/*

RUN apt-get update && apt-get install -y --no-install-recommends \
        git \
        zlib1g-dev \
        libxml2-dev \
        libzip-dev \
        libmcrypt-dev \
        libssl-dev
RUN apt-get install -y libwebp-dev libjpeg62-turbo-dev libpng-dev libxpm-dev libfreetype6-dev

RUN pecl install xdebug-2.9.8 \
  && docker-php-ext-enable xdebug
COPY ./docker/xdebug/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN docker-php-ext-install \
        zip \
        intl \
		mysqli \
        pdo pdo_mysql

RUN docker-php-ext-configure gd --with-gd --with-jpeg-dir \
    --with-png-dir --with-zlib-dir --with-xpm-dir --with-freetype-dir

RUN docker-php-ext-install gd

RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

COPY ./ /var/www/dendromap
WORKDIR /var/www/dendromap/

# Pas forcement necessaire pour quelqu'un qui n'utilise pas symfony dans son project
RUN wget https://get.symfony.com/cli/installer -O - | bash
RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony
