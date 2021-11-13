#FROM php:7.4-fpm-alpine
FROM php:7.4-fpm
COPY install-composer.sh /

RUN apt-get update \
  && apt-get install -y zlib1g-dev libzip-dev zip libpng-dev libfreetype6-dev libjpeg62-turbo-dev libpq-dev libjpeg-dev curl wget \
  && docker-php-ext-install zip pdo_mysql\
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install -j$(nproc) gd 

# nodejs install
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -
RUN apt-get install -y nodejs

# Composer install
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('SHA384', 'composer-setup.php') === '$(wget -q -O - https://composer.github.io/installer.sig)') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin
WORKDIR /var/www/html
RUN composer global require "laravel/installer"


