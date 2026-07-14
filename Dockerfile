FROM php:8.3-fpm-alpine

# 1. Cài đặt các thư viện hệ thống (Chỉ cài 1 lần)
RUN apk add --no-cache \
    libzip-dev \
    icu-dev \
    libpng-dev \
    libxml2-dev \
    oniguruma-dev \
    git \
    composer \
    nodejs \
    npm

# 2. Cài đặt extension PHP
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

# 3. Cài đặt dependencies (PHP và Node)
RUN composer install --no-dev --optimize-autoloader --no-scripts --ignore-platform-reqs
RUN npm install
RUN npm run build

# Xóa node_modules để image nhẹ hơn
RUN rm -rf node_modules

# Phân quyền
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache && \
    chmod -R 775 /app/storage /app/bootstrap/cache

# 4. Khởi động
EXPOSE 8080
CMD php -S 0.0.0.0:8080 -t public
