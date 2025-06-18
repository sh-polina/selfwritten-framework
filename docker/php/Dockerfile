FROM php:8.3-fpm AS debian-fpm
SHELL ["/bin/bash", "-c"]
WORKDIR /app
COPY scripts/* /usr/local/bin/

RUN set -xeuo pipefail \
    && chown 1000:1000 /app \
    && apt-get update \
    && apt-get install -y git --no-install-recommends \
        bash \
        zip \
        unzip \
        imagemagick \
        libjpeg62-turbo \
        libpng16-16 \
        zlib1g \
        libicu72 \
        libpq5 \
        libmagickwand-dev \
        linux-libc-dev \
        libtool \
        zlib1g-dev \
        libpng-dev \
        libicu-dev \
        libjpeg-dev \
        libpq-dev \
    && docker-install-php-extensions \
    && apt-get purge -y linux-libc-dev zlib1g-dev libpng-dev libicu-dev libjpeg-dev libpq-dev libmagickwand-dev \
    && apt-get autoremove -y \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/pear

FROM php:8.3-fpm-alpine AS alpine-fpm
WORKDIR /app
COPY scripts/* /usr/local/bin/

RUN set -xeuo pipefail \
    && chown 1000:1000 /app \
    && apk add --no-cache \
        bash \
        zip \
        unzip \
        imagemagick \
        libjpeg-turbo \
        icu-libs \
        libpq \
        libpng \
        zlib \
    && apk add --no-cache --virtual .build-deps \
        $PHPIZE_DEPS \
        imagemagick-dev \
        linux-headers \
        libtool \
        zlib-dev \
        libpng-dev \
        icu-dev \
        libjpeg-turbo-dev \
        libpq-dev \
    && docker-install-php-extensions \
    && apk del .build-deps \
    && rm -rf /tmp/pear
