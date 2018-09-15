<?php

class BooleanTestTest
	extends PHPUnit\Framework\TestCase
{
	public function testFail()
	{
		$dn = new \Neuron\Data\Validation\Boolean();

		$this->assertFalse( $dn->isValid( 'string' ) );
	}

	public function testPass()
	{
		$dn = new \Neuron\Data\Validation\Boolean();

		$this->assertTrue( $dn->isValid( true ) );
	}

}
