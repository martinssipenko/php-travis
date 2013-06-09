#!/bin/sh

echo "=== Initializing CI environment ==="

composer self-update
composer install --dev

vendor/bin/sauce_config $SAUCE_USERNAME $SAUCE_ACCESS_KEY

chmod +x ./build/script.sh

printf "\n=== The CI environment has been initialized ===\n"