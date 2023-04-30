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
1. `sudo chown -R $(id --user):$(id --group) vendor`
1. `./vendor/bin/sail up -d`
1. `cp .env.example .env`
1. `./vendor/bin/sail php artisan key:generate`
1. App should be running at http://localhost

## Prod setup
1. Clone this repo
1. Run `./run-prod.sh`
1. `cd prod`
1. `cp .env.example .env`
1. Set APP_KEY in `prod/.env`
1. Run `./run-prod.sh`

To get the latest changes, run:
1. `git pull`
1. `./run-prod.sh`
