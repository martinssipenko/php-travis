#!/bin/bash

SELENIUM_URL=http://selenium.googlecode.com/files/
SELENIUM_FILE=selenium-server-standalone-2.33.0.jar
WP_VERSION=3.4.2

echo "Running local tests"

echo "Installing dependancies"

sudo apt-get install openjdk-6-jre-headless -y && \
sudo apt-get install firefox -y && \
sudo apt-get install xvfb -y && \
sudo apt-get install zip -y

echo "Packing up plugin";

cp -r src test-plugin && \
zip -r test-plugin.zip test-plugin/ && \
rm -r test-plugin/


echo "DB Cleanup";
mysql -u root -proot -e 'DROP DATABASE IF EXISTS `wp_selenium`;' && \
mysql -u root -proot -e 'CREATE DATABASE IF NOT EXISTS `wp_selenium`;'


echo "WP Cleanup";
rm -rf /home/vagrant/sites/selenium.localhost/*

echo "WP Setup";
./vendor/bin/wp core download --version=$WP_VERSION --path=/home/vagrant/sites/selenium.localhost/

echo "Configuring WordPress"
./vendor/bin/wp core config --path=/home/vagrant/sites/selenium.localhost/ --dbname=wp_selenium --dbuser=root --dbpass=root

echo "Installing WordPress"
./vendor/bin/wp core install --path=/home/vagrant/sites/selenium.localhost/ --url=http://selenium.localhost:8080/ --title=WordPress --admin_email=test@test.test --admin_password=admin

echo "Installing WordPress Plugins"
./vendor/bin/wp plugin install test-plugin.zip --path=/home/vagrant/sites/selenium.localhost/ --activate

php ./build/update_config.php /home/vagrant/sites/selenium.localhost/wp-config.php

rm test-plugin.zip

Xvfb :99 -screen 0 1024x768x24 -fbdir /tmp -ac > /tmp/xvfb.log 2>&1 &
export DISPLAY=:99

if [ ! -f ~/$SELENIUM_FILE ]; then
    echo "Selenium not found, downloading..."
    wget -P ~/ $SELENIUM_URL$SELENIUM_FILE
fi
java -jar ~/$SELENIUM_FILE > /tmp/selenium_server.log 2>&1 &

./vendor/bin/phpunit --testsuite=Unit
./vendor/bin/paratest --phpunit=vendor/bin/phpunit tests/phptravis/Selenium

sudo killall Xvfb
sudo killall java