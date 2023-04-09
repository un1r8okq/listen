#!/bin/bash
php artisan config:cache
touch /var/www/html/database/database.sqlite
apache2-foreground
