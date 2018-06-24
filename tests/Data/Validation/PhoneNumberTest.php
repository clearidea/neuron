<?php

class PhoneNumberTest extends PHPUnit\Framework\TestCase
{
	public function testFail()
	{
		$Phone = new \Neuron\Data\Validation\PhoneNumber();

		$this->assertFalse( $Phone->isValid( '5541234x' ) );
	}

	public function testPass()
	{
		$Phone = new \Neuron\Data\Validation\PhoneNumber();

		$this->assertTrue( $Phone->isValid( '941-248-3500' ) );
	}
}
