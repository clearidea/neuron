<?php

/**
 * Created by PhpStorm.
 * User: lee
 * Date: 7/27/16
 * Time: 6:55 PM
 */
class DateRangeTest extends PHPUnit_Framework_TestCase
{
	public function testFormatFail()
	{
		$dn = new \Neuron\Data\Validation\DateRange();

		$dn->setFormat( 'Y-m-d' );
		$dn->setRange( '2000-01-01', '2020-01-02');

		$this->assertFalse( $dn->isValid( '01-01-2015' ) );
	}

	public function testRangeFail()
	{
		$dn = new \Neuron\Data\Validation\DateRange();

		$dn->setFormat( 'Y-m-d' );
		$dn->setRange( '2000-01-01', '2000-01-02');

		$this->assertFalse( $dn->isValid( '01-01-2015' ) );
	}

	public function testRangePass()
	{
		$dn = new \Neuron\Data\Validation\DateRange();

		$dn->setFormat( 'Y-m-d' );
		$dn->setRange( '2000-01-01', '2020-01-02');

		$this->assertTrue( $dn->isValid( '2015-01-01' ) );
	}

}
