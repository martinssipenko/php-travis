#!/bin/sh

echo "=== Starting tests ==="

php -l lib/
vendor/bin/phploc --count-tests --exclude vendor/ lib/ tests/ > build/logs/phploc.txt
vendor/bin/phploc --count-tests --log-xml build/logs/phploc.xml lib/ tests/
vendor/bin/phpcs --report=checkstyle --report-file=build/logs/checkstyle.xml --standard=PSR2 lib/ tests/
vendor/bin/paratest --phpunit=vendor/bin/phpunit