#!/bin/sh

echo "=== Initializing CI environment ==="

chmod +x ./build/script.sh

composer self-update
composer install --dev

sudo service nginx start
sleep 3

vendor/bin/sauce_config $SAUCE_USERNAME $SAUCE_ACCESS_KEY
vendor/bin/sauce_connect > /dev/null 2>&1 &

printf "\n=== The CI environment has been initialized ===\n"