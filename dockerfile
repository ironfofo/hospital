# 使用 php:7.4-apache 作為基礎鏡像
FROM php:7.4-apache

# 安裝必要的依賴和 PHP 擴展
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    libzip-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo_mysql zip

# 啟用 mod_rewrite (Laravel 需要這個)
RUN a2enmod rewrite

# 設定工作目錄
WORKDIR /var/www/html

# 複製應用程式目錄內容到容器
COPY . /var/www/html

# 安裝 Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 安裝應用程式依賴
RUN composer install

# 複製並設置目錄的權限
COPY --chown=www-data:www-data . /var/www/html

# 替換 Apache 的 DocumentRoot，讓它指向 public 目錄
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf && \
    sed -i 's|<Directory /var/www/html>|<Directory /var/www/html/public>|' /etc/apache2/sites-available/000-default.conf && \
    echo '<Directory /var/www/html/public>' >> /etc/apache2/sites-available/000-default.conf && \
    echo '    AllowOverride All' >> /etc/apache2/sites-available/000-default.conf && \
    echo '    Require all granted' >> /etc/apache2/sites-available/000-default.conf && \
    echo '</Directory>' >> /etc/apache2/sites-available/000-default.conf

# 開放 80 端口
EXPOSE 80

# 啟動 Apache 伺服器
CMD ["apache2-foreground"]
