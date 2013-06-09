#!/bin/sh

echo "=== Initializing CI environment ==="

composer self-update
composer install --dev

chmod +x ./build/script.sh

printf "\n=== The CI environment has been initialized ===\n"