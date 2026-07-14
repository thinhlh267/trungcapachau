FROM php:8.3-cli-alpine

# Chỉ cài đặt những gói hệ thống cần thiết (zip và intl)
RUN apk add --no-cache libzip-dev icu-dev composer git

# Cài đặt extension cần thiết (tokenizer & session là mặc định, không cần cài)
RUN docker-php-ext-install zip intl

# Cấu hình làm việc
COPY . /app
WORKDIR /app

# Cài đặt dependency
RUN composer install --no-dev --optimize-autoloader

# Khởi động web server
CMD php -S 0.0.0.0:8080 -t public
