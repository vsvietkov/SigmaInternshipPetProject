FROM node:16.13.1-alpine3.15
RUN npm install -g npm@8.5.5
WORKDIR /var/www
# Arguments defined in docker-compose.yml
ARG user
ARG uid
# Create system user to run npm commands
RUN adduser -u $uid -h /home/$user -D $user && \
    echo "$user:Securepass1!" | chpasswd && \
    addgroup $user root && \
    addgroup $user www-data && \
    chown -R $user:root /home/$user && chown -R $user:root /var/www
USER $user
