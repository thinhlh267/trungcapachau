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

# Cài đặt Node.js và NPM
RUN apk add --no-cache nodejs npm

# Cài đặt PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-scripts --ignore-platform-reqs

# Cài đặt Node dependencies và BUILD Vite
RUN npm install
RUN npm run build

# Xóa node_modules để giảm dung lượng image
RUN rm -rf node_modules

# Phân quyền cho storage và cache
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache && \
    chmod -R 775 /app/storage /app/bootstrap/cache

# 5. Khởi động ứng dụng bằng PHP built-in server
EXPOSE 8080
CMD php -S 0.0.0.0:8080 -t public
