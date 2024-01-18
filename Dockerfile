# Use the official PHP image as the base image
FROM php:7.4-apache

# Install required extensions and dependencies
RUN apt-get update && \
    apt-get install -y \
        libzip-dev \
        zip \
        unzip \
        && docker-php-ext-install zip pdo_mysql

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory
WORKDIR /var/www/html

# Copy the composer files and install dependencies
COPY composer.json composer.lock ./
RUN composer install --no-scripts --no-autoloader

# Copy the rest of the application code
COPY . .

# Generate the autoloader
RUN composer dump-autoload --optimize

# Install npm and Node.js
RUN apt-get install -y nodejs npm

# Install Vue CLI globally
RUN npm install -g @vue/cli

# Install the application dependencies
RUN npm install

# Build the assets
RUN npm run dev

# Expose the port
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
