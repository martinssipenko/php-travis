#!/bin/sh

echo "Build number:" $TRAVIS_BUILD_NUMBER
echo "=== Initializing CI environment ==="

SAUCE_BUILD=$TRAVIS_BUILD_NUMBER

chmod +x ./build/script.sh

composer self-update
composer install --prefer-source --no-interaction --dev

sudo service nginx start
sleep 3

vendor/bin/sauce_config $SAUCE_USERNAME $SAUCE_ACCESS_KEY

printf "\n=== The CI environment has been initialized ===\n"