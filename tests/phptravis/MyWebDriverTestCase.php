<?php

class MyWebDriverTestCase extends \Sauce\Sausage\WebDriverTestCase
{
    public static $browsers = array();

    public static function suite($className) {
        if(getenv('TRAVIS_BUILD_NUMBER') == true) {
            self::$browsers = array(
                array(
                    'browserName' => 'iphone',
                    'desiredCapabilities' => array(
                        'version' => '6',
                        'platform' => 'OS X 10.8'
                    ),
                ),
                array(
                    'browserName' => 'chrome',
                    'desiredCapabilities' => array(
                        'platform' => 'Linux'
                    ),
                ),
                array(
                    'browserName' => 'firefox',
                    'desiredCapabilities' => array(
                        'version' => '15',
                        'platform' => 'VISTA'
                    ),
                ),
            );
        } else {
            self::$browsers = array(
                array(
                    'browserName' => 'firefox',
                    'local' => true,
                    'sessionStrategy' => 'shared',
                ),
            );
        }

        return parent::suite($className);
    }
}