<?php

namespace phptravis\Test;

class MySauceTest extends \Sauce\Sausage\WebDriverTestCase
{
    public static $browsers = array(
        array(
            'browserName' => 'chrome',
            'desiredCapabilities' => array(
                'platform' => 'Linux'
          )
        )
    );

    public function setUp()
    {
        parent::setUp();
        $this->setBrowserUrl('http://localhost');
    }

    public function testTitle()
    {
        $this->url('http://localhost');
        $this->assertContains("Welcome to nginx!", $this->title());
    }
}