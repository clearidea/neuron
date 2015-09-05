<?php

/**
 * Created by PhpStorm.
 * User: lee
 * Date: 9/5/15
 * Time: 11:07 AM
 */

class StringTest
	extends PHPUnit_Framework_TestCase
{
	public function testFail()
	{
		$dn = new \Neuron\Data\Validation\String();

		$this->assertFalse( $dn->isValid( 1 ) );
	}

	public function testPass()
	{
		$dn = new \Neuron\Data\Validation\String();

		$this->assertTrue( $dn->isValid( 'test@example.org' ) );
	}
}