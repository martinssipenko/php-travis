<?php

namespace phptravis\Test;

class MySauceTest extends \Sauce\Sausage\WebDriverTestCase
{
    public static $browsers = array(
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
        array(
            'browserName' => 'firefox',
            'desiredCapabilities' => array(
                'version' => '15',
                'platform' => 'VISTA'
            )
        ),
    );

    public function setUp()
    {
        parent::setUp();
        $this->setBrowserUrl('http://localhost');
    }

    public function testTitle()
    {
        $this->url('http://localhost');
        $this->assertContains("WordPress", $this->title());
    }
}