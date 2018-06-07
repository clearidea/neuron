<?php

class IntegerTest extends PHPUnit_Framework_TestCase
{
	public function testFail()
	{
		$Integer = new \Neuron\Data\Validation\Integer();

		$this->assertFalse( $Integer->isValid( 'non int' ) );
	}

	public function testPass()
	{
		$Integer = new \Neuron\Data\Validation\Integer();

		$this->assertTrue( $Integer->isValid( 1 ) );
	}

}
