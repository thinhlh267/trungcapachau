FROM php:8.3-cli-alpine

# Cài đặt các thư viện hệ thống cần thiết cho Zip và Intl
RUN apk add --no-cache libzip-dev icu-dev \
    && docker-php-ext-install zip intl

# Copy mã nguồn vào
COPY . /app
WORKDIR /app

# Lệnh khởi động ứng dụng
CMD php -S 0.0.0.0:8080 -t public
