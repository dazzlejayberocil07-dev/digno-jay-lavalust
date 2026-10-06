ARG PHP_VERSION=8.2

FROM php:${PHP_VERSION}-apache

# Install system dependencies and PHP extensions (PDO MySQL & SQLite)
RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite \
    && rm -rf /var/lib/apt/lists/*

# Enable Apache mod_rewrite module for LavaLust routing
RUN a2enmod rewrite

# Copy project files
COPY . /var/www/html/

# Set DocumentRoot to public directory
RUN sed -i 's#DocumentRoot /var/www/html#DocumentRoot /var/www/html/public#' \
    /etc/apache2/sites-available/000-default.conf

# Enable AllowOverride All for .htaccess
RUN printf '<Directory /var/www/html/public>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>\n' >> /etc/apache2/apache2.conf

# Configure directory permissions and runtime directory for SQLite
RUN mkdir -p /var/www/html/runtime \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 777 /var/www/html/runtime \
    && chmod -R 755 /var/www/html

EXPOSE 80