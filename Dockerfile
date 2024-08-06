
FROM php:8.2-apache as base-php

# Necessary for mysql drivers
RUN docker-php-ext-install mysqli pdo pdo_mysql 