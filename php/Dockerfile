FROM php:7.4.7-fpm
WORKDIR /var/www/html
COPY php.ini /usr/local/etc/php/
RUN apt-get update \
&& docker-php-ext-install pdo_mysql && \
docker-php-ext-install pdo_mysql
COPY php.ini /usr/local/etc/php/

# phpという名前のコンテナ：バージョン
# ココに書くときは、やむるにビルドが必要
# それを走らせる