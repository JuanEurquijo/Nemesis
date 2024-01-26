#!/usr/bin/env bash

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Reseting migrations..."
php artisan migrate:reset --force

echo "Running migrations..."
php artisan migrate --force
php artisan db:seed --force