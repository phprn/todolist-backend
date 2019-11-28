FROM php:7.3
RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo mbstring
WORKDIR /app
COPY . /app
RUN composer install
RUN php artisan key:generate
RUN php artisan migrate
RUN php vendor/bin/phpunit

CMD php artisan serve --host=0.0.0.0 --port=8080
EXPOSE 8080
