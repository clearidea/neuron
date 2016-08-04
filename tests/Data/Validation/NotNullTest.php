<?php

/**
 * Created by PhpStorm.
 * User: lee
 * Date: 8/3/16
 * Time: 10:57 AM
 */
class NotNullTest extends PHPUnit_Framework_TestCase
{
	public function testNotNull()
	{
		$Validator = new \Neuron\Data\Validation\NotNull();

		$this->assertTrue( $Validator->isValid( 'test' ) );
		$this->assertTrue( $Validator->isValid( '' ) );
		$this->assertTrue( $Validator->isValid( 0 ) );
		$this->assertTrue( $Validator->isValid( false ) );
		$this->assertFalse( $Validator->isValid( null ) );
	}
}
