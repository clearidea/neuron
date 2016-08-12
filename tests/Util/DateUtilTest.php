<?php

class DateUtilTest extends PHPUnit_Framework_TestCase
{
	protected function setUp()
	{
	}

	protected function tearDown()
	{
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
