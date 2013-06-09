<?php

namespace phptravis\Test;

use phptravis\dummyClass;

class dummyClassTest extends \PHPUnit_Framework_TestCase
{
	public function testDummy() {
		$dummyClass = new dummyClass();
		$this->assertTrue($dummyClass->dummyMethod());
		$this->assertInstanceOf('phptravis\dummyClass', $dummyClass);
	}
}