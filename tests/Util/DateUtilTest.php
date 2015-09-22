<?php
/**
 * Created by PhpStorm.
 * User: lee
 * Date: 9/5/15
 * Time: 4:29 PM
 */

class DateUtilTest extends PHPUnit_Framework_TestCase
{
	protected function setUp()
	{
	}

	public function testPass()
	{
		$this->assertTrue(
			Neuron\Util\Date::isLeapYear( 2004 )
		);

		$this->assertFalse(
			Neuron\Util\Date::isLeapYear( 2003 )
		);

		$this->assertTrue(
			Neuron\Util\Date::getDaysInMonth( 1 ) == 31
		);

		$this->assertTrue(
			Neuron\Util\Date::getDaysInMonth( 2, 2004 ) == 29
		);

		$this->assertTrue(
			Neuron\Util\Date::getDaysInMonth( 2, 1805 ) == 28
		);

		$this->assertTrue(
			Neuron\Util\Date::diff( date( 'Y-m-d' ), date( 'Y-m-d', strtotime( "-30 days" ) ) ) == 30
		);

		$this->assertTrue(
			Neuron\Util\Date::subtractDays( 8, '2015-01-30' ) == '2015-01-22'
		);

		$this->assertFalse(
			Neuron\Util\Date::subtractDays( 8, '2015-01-30' ) == '2015-01-21'
		);

	}

	protected function tearDown()
	{
	}
}
