<?php

class TemporaryTest extends PHPUnit_Framework_TestCase
{
	public function testGetFile()
	{
		$name = \Neuron\File\Temporary::getFile();

		$this->assertFalse( file_exists( $name ) );
	}
}
