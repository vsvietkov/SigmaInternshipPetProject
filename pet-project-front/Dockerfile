FROM node:16.13.1-alpine3.15

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Create system user to run Composer and Artisan Commands
RUN adduser -u $uid -h /home/$user -D $user
RUN echo "$user:Securepass1!" | chpasswd
RUN addgroup $user root
RUN addgroup $user www-data

WORKDIR /var/www
RUN chown -R $user:root /home/$user && chown -R $user:root /var/www
USER $user

COPY ./package*.json ./
RUN npm install
