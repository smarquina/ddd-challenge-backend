FROM php:7.4-apache

RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    zlib1g-dev \
    libpng-dev \
    zip \
    unzip \
    libxml2-dev \
    libzip-dev \
    wkhtmltopdf \
    libssl-dev;

RUN docker-php-ext-install \
    gd \
    exif \
    zip \
    intl \
    mysqli \
    opcache \
    pdo pdo_mysql;

RUN docker-php-ext-enable opcache;

RUN curl -sS https://getcomposer.org/installer > composer-setup.php && php composer-setup.php --version=1.10.10 && mv composer.phar /usr/local/bin/composer;

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
