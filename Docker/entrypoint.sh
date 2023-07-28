#!/bin/bash

if [ ! -f "vendor/autoload.php" ]; then
  composer install --no-progress --no-interaction
fi

if [ ! -f ".env"]; then
  echo "Creating env File for Env $APP_ENV"
  cp .env.example .env
else
  echo "Env File already exists"
fi

php artisan key:generate
php artisan cache:clear
php artisan config:cache
php artisan view:clear
php artisan route:clear
php artisan migrate

php artisan serve --port=$PORT --host=0.0.0.0 --env=.env
exec docker-php-entrypoint "$@"
