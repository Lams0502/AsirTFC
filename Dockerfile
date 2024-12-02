FROM php:8.2-apache

# Instalar las dependencias necesarias para mysqli (usando MariaDB)
RUN apt-get update && apt-get install -y libmariadb-dev-compat libmariadb-dev \
    && docker-php-ext-install mysqli

# Habilitar el módulo de reescritura de Apache
RUN a2enmod rewrite
