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

# 啟用 Apache 的 mod_rewrite 模組
# 這個指令會在 /etc/apache2/mods-available/ 目錄下建立一個符號連結
# a2enmod 是 Apache2 的一個工具，用來啟用或禁用 Apache2 的模組
RUN a2enmod rewrite

# 設定工作目錄
# 這個指令會在容器內建立一個名為 /var/www/html 的目錄，並將它設置為工作目錄
WORKDIR /var/www/html

# 複製應用程式目錄內容到容器
# 這個指令會將應用程式目錄內容複製到容器的 /var/www/html 目錄
# 這裡的 . 代表應用程式目錄
COPY . /var/www/html

# 安裝 Composer 並設置環境變數 PATH 讓 Composer 可以全域使用
# 這個指令會從 composer:latest 鏡像中複製 Composer 執行檔到容器
# 並將它複製到 /usr/bin/composer 這個路徑
# 這樣 Composer 就可以全域使用了
# latest 是 Composer 的一個 tag，代表最新版本
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer 

# 安裝應用程式依賴 
# 這個指令會安裝應用程式的 PHP 依賴
RUN composer install

# 複製並設置目錄的權限
# 這個指令會將容器內的 /var/www/html 目錄的擁有者設置為 www-data
# www-data 是 Apache 伺服器的使用者
COPY --chown=www-data:www-data . /var/www/html


# 替換 Apache 的 DocumentRoot，讓它指向 public 目錄
# 這樣 Apache 伺服器就可以讀取和寫入這個目錄了
# 這個指令會修改 /etc/apache2/sites-available/000-default.conf 檔案
# 將裡面的 DocumentRoot 和 <Directory> 設定改為 public 目錄
# 並且設定 AllowOverride All，這樣 .htaccess 檔案才會生效
# .htaccess 檔案是 Apache 的一個設定檔，可以用來設定伺服器的行為
# 這個檔案是 Apache 的設定檔，裡面包含了 Apache 的設定
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf && \
    sed -i 's|<Directory /var/www/html>|<Directory /var/www/html/public>|' /etc/apache2/sites-available/000-default.conf && \
    echo '<Directory /var/www/html/public>' >> /etc/apache2/sites-available/000-default.conf && \
    echo '    AllowOverride All' >> /etc/apache2/sites-available/000-default.conf && \
    echo '    Require all granted' >> /etc/apache2/sites-available/000-default.conf && \
    echo '</Directory>' >> /etc/apache2/sites-available/000-default.conf

# 開放 80 端口
# 這個指令會開放容器的 80 端口，這樣外部的請求才能訪問容器
EXPOSE 80

# 啟動 Apache 伺服器
# 這個指令會啟動 Apache 伺服器
# apache2-foreground 是一個由 php:7.4-apache 鏡像提供的指令
# 它會啟動 Apache 伺服器並且讓它在前台運行
CMD ["apache2-foreground"]
