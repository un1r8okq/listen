FROM php:8.2-apache
WORKDIR /var/www/html

COPY prod ./prod

RUN \
    # Use the default production PHP configuration
    mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" && \
    # Install Composer
    ./prod/install-composer.sh && \
    mv composer.phar /usr/local/bin/composer && \
    # Install dependencies
    apt-get update && \
    apt-get install --yes --no-install-recommends unzip && \
    rm -rf /var/lib/apt/lists/* && \
    # Install Apache rewrite module
    a2enmod rewrite && \
    # Install Apache configuration
    cp ./prod/listen.conf /etc/apache2/sites-available/listen.conf && \
    a2dissite 000-default.conf && \
    a2ensite listen.conf

USER www-data:www-data

COPY --chown=www-data:www-data . /var/www/html/

RUN ls -la && \
    composer install --optimize-autoloader --no-dev && \
    php artisan route:cache && \
    php artisan view:cache

ENTRYPOINT [ "./prod/entrypoint.sh" ]
