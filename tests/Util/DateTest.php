<?php

class DatelTest extends PHPUnit_Framework_TestCase
{
	protected function setUp()
	{
	}

	protected function tearDown()
	{
	}

	public function testDifferenceAsText()
	{
		// year

		$this->assertEquals(
			Neuron\Util\Date::differenceAsText( 31536000, 31536000 * 2 ),
			'1 year'
		);

		// years

		$this->assertEquals(
			Neuron\Util\Date::differenceAsText( 31536000, 31536000 * 3 ),
			'2 years'
		);

		// month

		$this->assertEquals(
			Neuron\Util\Date::differenceAsText( 2592000, 2592000 * 2 ),
			'1 month'
		);

		// week

		$this->assertEquals(
			Neuron\Util\Date::differenceAsText( 604800, 604800 * 2 ),
			'1 week'
		);

		// day

		$this->assertEquals(
			Neuron\Util\Date::differenceAsText( 86400, 86400 * 2 ),
			'1 day'
		);

		// hour

		$this->assertEquals(
			Neuron\Util\Date::differenceAsText( 3600, 3600 * 2 ),
			'1 hour'
		);

		// minute

		$this->assertEquals(
			Neuron\Util\Date::differenceAsText( 60, 60 * 2 ),
			'1 minute'
		);

		// second

		$this->assertEquals(
			Neuron\Util\Date::differenceAsText( 1, 1 * 2 ),
			'1 second'
		);

	}

	public function testLeapYear()
	{
		$this->assertTrue(
			Neuron\Util\Date::isLeapYear( 2004 )
		);

		$this->assertFalse(
			Neuron\Util\Date::isLeapYear( 2003 )
		);
	}

	public function testDaysInMonth()
	{
		$this->assertTrue(
			Neuron\Util\Date::getDaysInMonth( 1 ) == 31
		);

		$this->assertTrue(
			Neuron\Util\Date::getDaysInMonth( 2, 2004 ) == 29
		);

		$this->assertTrue(
			Neuron\Util\Date::getDaysInMonth( 2, 1805 ) == 28
		);
	}

	public function testDiff()
	{
		$this->assertTrue(
			Neuron\Util\Date::diff( date( 'Y-m-d' ), date( 'Y-m-d', strtotime( "-30 days" ) ) ) == 30
		);
	}

	public function testSubtractDays()
	{
		$this->assertTrue(
			Neuron\Util\Date::subtractDays( 8, '2015-01-30' ) == '2015-01-22'
		);

		$this->assertFalse(
			Neuron\Util\Date::subtractDays( 8, '2015-01-30' ) == '2015-01-21'
		);
	}
}
