#!/bin/bash
php artisan config:cache
php artisan migrate --force
touch /var/www/html/database/sqlite/database.sqlite
apache2-foreground
