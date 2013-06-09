#!/bin/sh

echo "=== Starting tests ==="

php -l lib/
vendor/bin/phploc --count-tests --exclude vendor/ lib/ tests/
vendor/bin/phploc --count-tests --exclude vendor/ lib/ tests/ > build/logs/phploc.txt
vendor/bin/phploc --count-tests --log-xml build/logs/phploc.xml lib/ tests/
vendor/bin/phpunit