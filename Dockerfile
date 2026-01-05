FROM php:8.2-cli

# Install system dependencies and required libraries for PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd intl \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Get Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy application files
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Expose port
EXPOSE 8080

# Create a startup script that properly reads PORT variable
RUN echo '#!/bin/bash\nPORT=${PORT:-8080}\nexec php -S 0.0.0.0:$PORT -t public' > /start.sh && chmod +x /start.sh

# Start PHP server
CMD ["/start.sh"]
