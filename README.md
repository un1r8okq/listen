# Listen

## Local setup
First you need to install the Composer dependencies. This is a bit messy.
1. `docker run -it -v "$(pwd):/app" php bash`
1. `cd /app`
1. `apt update`
1. `apt install unzip wget`
1. `wget https://raw.githubusercontent.com/composer/getcomposer.org/76a7060ccb93902cd7576b67264ad91c8a2700e2/web/installer -O - -q | php -- --quiet`
1. `mv composer.phar /usr/local/bin/composer`
1. `composer install`
1. `quit`
1. `./vendor/bin/sail up -d`
1. `cp .env.example .env`
1. `./vendor/bin/sail php artisan key:generate`
1. App should be running at http://localhost
