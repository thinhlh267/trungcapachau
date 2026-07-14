FROM php:8.3-cli-alpine

# 1. Cài đặt các thư viện hệ thống cần thiết
RUN apk add --no-cache \
    libzip-dev \
    icu-dev \
    libpng-dev \
    libxml2-dev \
    composer \
    git

# 2. Cài đặt các extension PHP cần thiết (Đặc biệt là pdo_mysql)
# Đây là bước quan trọng nhất để sửa lỗi "Class PDO not found"
RUN docker-php-ext-install \
    zip \
    intl \
    pdo \
    pdo_mysql \
    bcmath \
    gd

# Thiết lập thư mục làm việc
COPY . /app
WORKDIR /app

# 3. Cài đặt thư viện
# Chúng ta dùng --no-scripts để tránh lỗi package:discover khi chưa sẵn sàng
# Sau đó sẽ chạy artisan sau nếu cần
RUN composer install --no-dev --optimize-autoloader --no-scripts --ignore-platform-reqs

# Khởi động ứng dụng
CMD php -S 0.0.0.0:8080 -t public

RUN docker-php-ext-install pdo pdo_mysql tokenizer session mbstring intl zip
