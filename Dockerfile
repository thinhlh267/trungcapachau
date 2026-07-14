FROM php:8.3-cli-alpine

# Cài đặt thư viện hệ thống và các extension PHP cần thiết
RUN apk add --no-cache libzip-dev icu-dev composer git \
    && docker-php-ext-install zip intl tokenizer session

# Copy mã nguồn vào
COPY . /app
WORKDIR /app

# Cài đặt thư viện PHP
RUN composer install --no-dev --optimize-autoloader

# Lệnh khởi động ứng dụng
CMD php -S 0.0.0.0:8080 -t public
