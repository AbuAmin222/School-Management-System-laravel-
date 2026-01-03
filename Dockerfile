# الخطوة 1: تحديد الإصدار
FROM php:8.2-fpm

# الخطوة 2: تثبيت ملحقات النظام (أضفنا libzip-dev هنا)
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

# الخطوة 3: تثبيت ملحقات PHP (أضفنا zip هنا)
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# الخطوة 4: تثبيت Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . .

# الخطوة 5: تثبيت الاعتمادات (الآن ستعمل بنجاح)
RUN composer install --no-interaction --optimize-autoloader

# الخطوة 6: تشغيل التطبيق
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
