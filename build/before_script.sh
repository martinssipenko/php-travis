#!/bin/sh

# Set www root dir variable
export WWW_ROOT=/home/vagrant/sites/selenium.localhost

echo "Build number:" $TRAVIS_BUILD_NUMBER
# echo "=== Initializing CI environment ==="

chmod +x ./build/script.sh

# Update composer to latest version
composer self-update

# Install package dependancies
composer install --prefer-source --no-interaction --dev

# Prepare plugin
cp -r src test-plugin
zip -r test-plugin.zip test-plugin/
rm -r test-plugin/

# Replace nginx config file
sudo cp ./build/travis_nginx.conf /etc/nginx/nginx.conf

sudo service nginx restart
sudo service php5-fpm restart
sleep 3

# Make sure www root directory exists
sudo rm -rf $WWW_ROOT
sudo mkdir -p $WWW_ROOT

# set mysql password
sudo mysqladmin -uroot password root

# Create MySQL database for WordPress
sudo mysql -u root -proot -e 'CREATE DATABASE IF NOT EXISTS `wp_selenium`;'

sudo ./vendor/bin/wp core download --version=$WP_VERSION --path=$WWW_ROOT
sudo ./vendor/bin/wp core config --path=$WWW_ROOT --dbname=wp_selenium --dbuser=root --dbpass=root
sudo ./vendor/bin/wp core install --path=$WWW_ROOT --title=WordPress --admin_email=test@test.test --admin_password=admin
sudo ./vendor/bin/wp plugin install test-plugin.zip --path=$WWW_ROOT --activate

rm test-plugin.zip

sudo chown -R www-data $WWW_ROOT

# printf "\n=== The CI environment has been initialized ===\n"