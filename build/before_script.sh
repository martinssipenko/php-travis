#!/bin/sh

echo "Build number:" $TRAVIS_BUILD_NUMBER
echo "=== Initializing CI environment ==="

SAUCE_BUILD=$TRAVIS_BUILD_NUMBER

chmod +x ./build/script.sh

composer self-update
composer install --prefer-source --no-interaction --dev

cat /etc/nginx/nginx.conf
cat /etc/nginx/sites-enabled/default
sudo cp ./build/travis_nginx.conf /etc/nginx/nginx.conf

sudo service nginx start
sleep 3
sudo service php-fpm start
sleep 3

mysql -e 'CREATE DATABASE wordpress_test;' -uroot

export WWW_ROOT=/usr/share/nginx/www
sudo rm -r $WWW_ROOT
sudo mkdir -p $WWW_ROOT
sudo chown www-data $WWW_ROOT

wget -nv -O /tmp/wordpress.tar.gz https://github.com/WordPress/WordPress/tarball/$WP_VERSION
sudo tar --strip-components=1 -zxmf /tmp/wordpress.tar.gz -C $WWW_ROOT

ls -la $WWW_ROOT

printf "\n=== The CI environment has been initialized ===\n"