<?php

namespace AdvancedPantheon\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Brain\Monkey;

class TestAssert extends TestCase {
	protected function setUp() : void {
		parent::setUp();
		Monkey\setUp();
	}

	protected function tearDown() : void {
		Monkey\tearDown();
		parent::tearDown();
	}

	public function test_sample() {
		$this->assertTrue( true );
	}
}
