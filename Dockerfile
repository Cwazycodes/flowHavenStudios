FROM php:8.2-apache

# Enable mod_rewrite
RUN a2enmod rewrite

# Copy everything to working directory
COPY . /var/www/html/

# Change Apache DocumentRoot to /var/www/html/public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

# Update Apache site config to use new DocumentRoot
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Optional: Install Composer
RUN apt-get update && apt-get install -y unzip curl git \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Permissions
RUN chown -R www-data:www-data /var/www/html
