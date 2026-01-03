# تحديد الإصدار
FROM php:8.2-fpm

# تثبيت ملحقات النظام
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    libonig-dev \
    libxml2-dev

# :تثبيت ملحقات
# PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# :تثبيت
# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . .

#  تثبيت الاعتمادات
RUN composer install --no-interaction --optimize-autoloader

# تشغيل التطبيق
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
