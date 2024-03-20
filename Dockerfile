FROM node:21-alpine3.18 AS frontend-build
WORKDIR /front-code
COPY vite.config.js tailwind.config.js postcss.config.js package.json package-lock.json /front-code/
RUN npm install
COPY ./resources /front-code/resources
RUN npm run build
RUN npm run build

FROM alpine:3.19
WORKDIR /var/www/html

# Install packages and remove default server definition
RUN apk add --no-cache \
  curl \
  nginx \
  php83 \
  php83-common \
  php83-ctype \
  php83-curl \
  php83-dom \
  php83-fpm \
  php83-gd \
  php83-intl \
  php83-mbstring \
  php83-mysqli \
  php83-opcache \
  php83-openssl \
  php83-phar \
  php83-session \
  php83-xml \
  php83-xmlreader \
  php83-xmlwriter \
  php83-simplexml \
  php83-pdo_pgsql \
  php83-zip \
  php83-tokenizer \
  php83-fileinfo \
  supervisor

# Create symlink so programs depending on `php` still function
RUN ln -s /usr/bin/php83 /usr/bin/php

# Configure nginx
COPY docker/nginx.conf /etc/nginx/nginx.conf

# Configure PHP-FPM
COPY docker/fpm-pool.conf /etc/php83/php-fpm.d/www.conf
COPY docker/php.ini /etc/php83/conf.d/custom.ini

# Configure supervisord
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Make sure files/folders needed by the processes are accessable when they run under the nobody user
RUN chown -R nobody.nobody /var/www/html /run /var/lib/nginx /var/log/nginx

# Switch to use a non-root user from here on
USER nobody

# Install composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Add application
COPY composer.json composer.lock /var/www/html/
RUN composer install --no-scripts
COPY --chown=nobody ./ /var/www/html/

# Remove development packages
RUN composer install --no-dev --no-scripts
RUN mkdir -p /var/www/html/storage/app/public
COPY --from=frontend-build /front-code/public/build/ /var/www/html/public/build
RUN composer dump-autoload

# After deployment scripts
RUN chmod -R 775 storage
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache
RUN php artisan optimize
RUN php artisan storage:link

# Let supervisord start nginx & php-fpm
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
