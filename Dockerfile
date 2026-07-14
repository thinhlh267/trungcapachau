FROM php:8.3-cli-alpine

# Cài đặt các thư viện hệ thống cần thiết
RUN apk add --no-cache libzip-dev icu-dev composer git

# Copy mã nguồn vào
COPY . /app
WORKDIR /app

# Cài đặt thư viện PHP bằng Composer
RUN composer install --no-dev --optimize-autoloader

# Lệnh khởi động ứng dụng
CMD php -S 0.0.0.0:8080 -t public
