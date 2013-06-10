#!/bin/sh

echo "Build number:" $TRAVIS_BUILD_NUMBER
echo "=== Initializing CI environment ==="

SAUCE_BUILD=$TRAVIS_BUILD_NUMBER

chmod +x ./build/script.sh

composer self-update
composer install --prefer-source --no-interaction --dev

sudo cp ./build/travis_nginx.conf /etc/nginx/nginx.conf

sudo service nginx restart
sudo service php5-fpm restart
sleep 3

mysql -uroot < ./build/wordpress.sql

export WWW_ROOT=/usr/share/nginx/www
sudo rm -r $WWW_ROOT
sudo mkdir -p $WWW_ROOT

sudo cp ./build/wp-config.php $WWW_ROOT

wget -nv -O /tmp/wordpress.tar.gz https://github.com/WordPress/WordPress/tarball/$WP_VERSION
sudo tar --strip-components=1 -zxmf /tmp/wordpress.tar.gz -C $WWW_ROOT

sudo chown -R www-data $WWW_ROOT

printf "\n=== The CI environment has been initialized ===\n"