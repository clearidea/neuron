<?php

use Neuron\Log\Log;

class LogSingletonTest extends PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$Log = new \Neuron\Log\Log();
		$Log->init();

		parent::setUp();
	}

	public function testPass()
	{
		Log::setRunLevel( Neuron\Log\ILogger::DEBUG );
		$test = 'this is a test';

		ob_start();

		Log::log( $test, Neuron\Log\ILogger::INFO );

		$str = ob_get_contents();

		ob_end_clean();

		$this->assertTrue( strstr( $str, $test ) ? true : false );

	}

	public function testFail()
	{
		Log::setRunLevel( Neuron\Log\ILogger::INFO );
		$test = 'this is a test';

		ob_start();

		Log::log( $test, Neuron\Log\ILogger::DEBUG );

		$str = ob_get_contents();

		ob_end_clean();

		$this->assertTrue( $str == '' );

	}
}
