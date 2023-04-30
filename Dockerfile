FROM php:8.2-apache
WORKDIR /var/www/html

COPY prod ./prod

RUN \
    # Use the default production PHP configuration
    mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" && \
    # Install Composer
    ./prod/install-composer.sh && \
    # Install NodeJS source
    curl -fsSL https://deb.nodesource.com/setup_19.x | bash - && \
    # Install dependencies
    apt-get install --yes --no-install-recommends unzip nodejs && \
    rm -rf /var/lib/apt/lists/* && \
    # Fix NPM caching bug
    # https://github.com/npm/cli/issues/5114#issuecomment-1196456412
    npm config set cache /tmp --global && \
    # Install Apache rewrite module
    a2enmod rewrite && \
    # Install Apache configuration
    cp ./prod/listen.conf /etc/apache2/sites-available/listen.conf && \
    a2dissite 000-default.conf && \
    a2ensite listen.conf && \
    # Install PHP OpCache extension
    docker-php-ext-configure opcache && \
    docker-php-ext-install opcache

USER www-data:www-data

COPY --chown=www-data:www-data . /var/www/html/

RUN composer install --optimize-autoloader --no-dev && \
    npm install && \
    npm run build && \
    php artisan route:cache && \
    php artisan view:cache

ENTRYPOINT [ "./prod/entrypoint.sh" ]
