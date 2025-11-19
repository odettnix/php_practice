FROM php:8.2-apache

# Установка системных зависимостей
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql mysqli \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Включение mod_rewrite для Apache
RUN a2enmod rewrite

# Настройка Apache для работы с .htaccess
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Установка рабочей директории
WORKDIR /var/www/html

# Установка прав доступа (файлы будут монтироваться через volume)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Открытие порта
EXPOSE 80

# Запуск Apache
CMD ["apache2-foreground"]

