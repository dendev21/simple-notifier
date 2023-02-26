FROM php:8.1.16-cli

RUN apt-get update -y && apt-get install -y curl

COPY --from=composer:2.5.4 /usr/bin/composer /usr/bin/composer

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /notifier

COPY . /notifier
RUN chmod -R 777 /notifier/storage

RUN composer -a install
