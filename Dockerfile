# Build stage for composer dependencies
FROM composer:2 AS vendor

# Install PHP extensions needed for dependency resolution
RUN install-php-extensions intl

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Production stage with FrankenPHP
FROM dunglas/frankenphp:1-php8.3-bookworm

# Install PHP extensions required by Laravel and Filament
RUN install-php-extensions \
    pdo_mysql \
    pdo_pgsql \
    mbstring \
    xml \
    curl \
    bcmath \
    zip \
    gd \
    intl \
    opcache \
    pcntl

# Set working directory
WORKDIR /app

# Copy application code
COPY . .

# Copy composer dependencies from build stage
COPY --from=vendor /app/vendor /app/vendor

# Install composer and run post-install scripts
COPY --from=vendor /usr/bin/composer /usr/bin/composer
RUN composer dump-autoload --optimize

# Create required directories and set permissions
RUN mkdir -p storage/framework/{sessions,views,cache} \
    && mkdir -p storage/logs \
    && mkdir -p bootstrap/cache \
    && chown -R www-data:www-data /app/storage /app/bootstrap/cache \
    && chmod -R 775 /app/storage /app/bootstrap/cache

# Expose port
EXPOSE 8000

# Health check
HEALTHCHECK --interval=30s --timeout=5s --start-period=10s --retries=3 \
    CMD php artisan tinker --execute="echo 'ok';" || exit 1

# Start the application
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
