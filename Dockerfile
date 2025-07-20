# Use official PHP + Apache image
FROM php:8.2-apache

# Enable mod_rewrite for clean URLs
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy all files (includes app logic outside /public)
COPY . /var/www/html/

# Move contents of /public to Apache's web root
RUN cp -r public/* /var/www/html/

# Optional: Install Composer
RUN apt-get update && apt-get install -y unzip curl git \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set permissions
RUN chown -R www-data:www-data /var/www/html
