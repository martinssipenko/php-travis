<?php

namespace phptravis\Test;

include 'MyWebDriverTestCase.php';

class MySauceTest extends \MyWebDriverTestCase
{
    public function setUp()
    {
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