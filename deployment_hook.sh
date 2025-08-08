#!/bin/bash

# Navigate to the application root
cd ~/applications/delight_interior/public_html

# Install PHP dependencies
composer install --no-interaction --prefer-dist --optimize-autoloader

# Run migrations forcefully
php artisan migrate --force

# Cache configurations and routes
php artisan config:cache
php artisan route:cache

# Install Node modules and build assets
npm install
npm run build
