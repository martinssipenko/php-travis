#!/bin/sh

echo "=== Initializing CI environment ==="

chmod +x ./build/script.sh

composer self-update
composer install --prefer-source --no-interaction --dev

sudo service nginx start
sleep 3

vendor/bin/sauce_config $SAUCE_USERNAME $SAUCE_ACCESS_KEY

printf "\n=== The CI environment has been initialized ===\n"