<?php

namespace phptravis\Test;

class MySauceTest extends \Sauce\Sausage\WebDriverTestCase
{
    public static $browsers;

    public function setUp()
    {
        //If ran on travis use saucelabs for browser testing
        if(getenv('TRAVIS_BUILD_NUMBER') == true) {
            var_dump( '   TRAVIS   ' );
            self::$browsers = array(
                    /*
                    array(
                        'browserName' => 'iphone',
                        'desiredCapabilities' => array(
                            'version' => '6',
                            'platform' => 'OS X 10.8'
                        )
                    ),
                    array(
                        'browserName' => 'chrome',
                        'desiredCapabilities' => array(
                            'platform' => 'Linux'
                        ),
                    ),
                    */
                    array(
                        'browserName' => 'firefox',
                        'desiredCapabilities' => array(
                            'version' => '15',
                            'platform' => 'VISTA'
                        )
                    ),
                );
        } else {
            $browser =  array(
                'browserName' => 'firefox',
                'local' => true,
                'sessionStrategy' => 'isolated'
            );

           $this->setupSpecificBrowser($browser);
        }

        parent::setUp();
        $this->setBuild(getenv('TRAVIS_BUILD_NUMBER'));
        $this->setBrowserUrl('http://selenium.localhost');
    }

    public function testTitle()
    {
        $this->url('http://selenium.localhost');
        $this->assertContains("WordPress", $this->title());
    }
}