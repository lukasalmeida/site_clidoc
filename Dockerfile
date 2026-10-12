FROM node:22-alpine AS assets

WORKDIR /app

COPY package.json package-lock.json ./
RUN npm ci

COPY resources ./resources
COPY tailwind.config.cjs vite.config.js ./
RUN npm run build

FROM php:8.3-cli AS app

RUN apt-get update \
    && apt-get install -y --no-install-recommends libonig-dev libsqlite3-dev unzip \
    && docker-php-ext-install mbstring pdo_sqlite \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .
RUN mkdir -p storage/framework/cache/data storage/framework/sessions storage/framework/views storage/logs bootstrap/cache \
    && composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader \
    && chown -R www-data:www-data storage bootstrap/cache

COPY --from=assets --chown=www-data:www-data /app/public/build public/build

USER www-data

EXPOSE 8000

CMD ["sh", "-c", "exec php artisan serve --host=0.0.0.0 --port=${PORT:-10000}"]
