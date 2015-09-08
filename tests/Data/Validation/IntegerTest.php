<?php

/**
 * Created by PhpStorm.
 * User: lee
 * Date: 9/5/15
 * Time: 11:07 AM
 */

class IntegerTest
	extends PHPUnit_Framework_TestCase
{
	public function testFail()
	{
		$dn = new \Neuron\Data\Validation\Integer();

		$this->assertFalse( $dn->isValid( 'non int' ) );
	}

	public function testPass()
	{
		$dn = new \Neuron\Data\Validation\Integer();

		$this->assertTrue( $dn->isValid( 1 ) );
	}

}