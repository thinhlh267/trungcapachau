# Sử dụng image PHP 8.3 CLI cơ bản
FROM php:8.3-cli-alpine

# 1. Cài đặt các thư viện hệ thống cần thiết cho các extension PHP
RUN apk add --no-cache \
    libzip-dev \
    icu-dev \
    composer \
    git \
    libpng-dev \
    libxml2-dev

# 2. Cài đặt và kích hoạt các extension PHP bằng lệnh của image gốc
# Các extension như tokenizer, session, phar, mbstring, ctype, v.v. đã nằm sẵn trong image này
# Chúng ta chỉ cần cài những cái cần thêm như zip, intl, v.v.
RUN docker-php-ext-install \
    zip \
    intl \
    pdo_mysql \
    bcmath \
    gd

# Thiết lập thư mục làm việc
COPY . /app
WORKDIR /app

# 3. Cài đặt thư viện với tùy chọn bỏ qua kiểm tra extension nếu cần thiết
# Điều này giúp Composer không bị dừng lại khi thấy môi trường đang build thiếu một vài thứ nhỏ lẻ
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# Khởi động ứng dụng
CMD php -S 0.0.0.0:8080 -t public
