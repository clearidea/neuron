<?php

/**
 * Created by PhpStorm.
 * User: lee
 * Date: 9/5/15
 * Time: 11:07 AM
 */

class FloatTest
	extends PHPUnit_Framework_TestCase
{
	public function testFail()
	{
		$dn = new \Neuron\Data\Validation\Float();

		$this->assertFalse( $dn->isValid( 'string' ) );
	}

	public function testPass()
	{
		$dn = new \Neuron\Data\Validation\Float();

		$this->assertTrue( $dn->isValid( 3.14) );
	}

}