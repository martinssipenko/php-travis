<?php
error_reporting(E_ALL | E_STRICT);

function include_if_exists($file) {
    if (file_exists($file)) {
        return include $file;
    }
}

if (!$loader = include_if_exists(__DIR__ . '/../vendor/autoload.php')) {
    echo 'You must set up the project dependencies!' . PHP_EOL;
    exit(1);
}

return $loader;