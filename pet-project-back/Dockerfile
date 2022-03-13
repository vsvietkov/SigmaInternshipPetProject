FROM php:8.0-fpm-alpine3.14

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Install system dependencies
RUN apk update && apk add --update --no-cache \
    git \
    curl

# Clear cache
RUN rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql exif pcntl

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN adduser -u $uid -h /home/$user -D $user
RUN echo "$user:Securepass1!" | chpasswd
RUN addgroup $user root
RUN addgroup $user www-data

RUN mkdir -p /home/$user/.composer && \
    chown -R $user:root /home/$user && \
    chown -R $user:root /var/www

# Set working directory
WORKDIR /var/www

USER $user
