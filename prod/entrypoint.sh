#!/bin/bash
php artisan config:cache
touch /var/www/html/database/sqlite/database.sqlite
apache2-foreground
