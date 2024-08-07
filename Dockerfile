
FROM php:8.2-apache as base-php

RUN apt-get update && apt-get install -y \
        zip \
        # Necessary for mysql drivers
        && docker-php-ext-install mysqli pdo pdo_mysql 

# Copy composer binary from "composer" image
# This way the composer will use the php version from current conteiner
COPY --from=composer /usr/bin/composer /usr/bin/composer
