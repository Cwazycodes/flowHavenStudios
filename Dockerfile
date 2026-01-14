FROM php:8.2-apache

# Enable mod_rewrite
RUN a2enmod rewrite

# Install dependencies first
RUN apt-get update && apt-get install -y unzip curl git \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy composer files first
COPY composer.json composer.lock* ./

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Copy everything else to working directory
COPY . /var/www/html/

# Change Apache DocumentRoot to /var/www/html
ENV APACHE_DOCUMENT_ROOT=/var/www/html

# Add Directory directive with AllowOverride All to the VirtualHost
RUN sed -i '/<\/VirtualHost>/i \
    <Directory /var/www/html>\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>' /etc/apache2/sites-available/000-default.conf

# Permissions
RUN chown -R www-data:www-data /var/www/html