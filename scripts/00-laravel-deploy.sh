#!/usr/bin/env bash

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate:reset --force
php artisan migrate:refresh --seed --force