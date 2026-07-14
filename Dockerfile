# Sử dụng image có cả PHP
FROM php:8.3-fpm-alpine

# 1. Cài đặt các thư viện hệ thống (bao gồm Node.js để build Vite)
RUN apk add --no-cache \
    libzip-dev \
    icu-dev \
    libpng-dev \
    libxml2-dev \
    libmbstring \
    oniguruma-dev \
    git \
    composer \
    nodejs \
    npm

# 2. Cài đặt các extension PHP cần thiết (gộp một lần để tối ưu layer)
RUN docker-php-ext-install \
    zip \
    intl \
    pdo \
    pdo_mysql \
    bcmath \
    gd \
    mbstring \
    pcntl

# Thiết lập thư mục làm việc
WORKDIR /app
COPY . /app

# 3. Cài đặt dependencies (PHP và JS)
# Chạy composer trước
RUN composer install --no-dev --optimize-autoloader --no-scripts --ignore-platform-reqs

# Cài đặt JS và build Vite (Giải quyết lỗi Vite manifest not found)
RUN npm install && npm run build

# 4. Phân quyền (Để Laravel có thể ghi file log/cache)
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache && \
    chmod -R 775 /app/storage /app/bootstrap/cache

# 5. Khởi động ứng dụng bằng PHP built-in server
EXPOSE 8080
CMD php -S 0.0.0.0:8080 -t public
