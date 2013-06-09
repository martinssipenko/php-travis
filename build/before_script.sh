#!/bin/sh

echo "=== Initializing CI environment ==="

pear install PHP_CodeSniffer
phpenv rehash
composer self-update
composer install --dev

mkdir -p build/logs

printf "\n=== The CI environment has been initialized ===\n"