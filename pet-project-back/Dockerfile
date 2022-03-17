FROM php:8.0-fpm-alpine3.14

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN adduser -u $uid -h /home/$user -D $user && \
    echo "$user:Securepass1!" | chpasswd && \
    addgroup $user root && \
    addgroup $user www-data

RUN mkdir -p /home/$user/.composer && \
    chown -R $user:root /home/$user && \
    chown -R $user:root /var/www

# Set working directory
WORKDIR /var/www
USER $user

COPY ./ ./
RUN composer install
