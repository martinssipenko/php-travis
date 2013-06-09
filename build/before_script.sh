#!/bin/sh

echo "=== Initializing CI environment ==="

composer self-update
composer install --dev

mkdir -p build/logs

printf "\n=== The CI environment has been initialized ===\n"