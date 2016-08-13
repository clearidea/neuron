<?php

/**
 * Created by PhpStorm.
 * User: lee
 * Date: 8/13/16
 * Time: 5:48 PM
 */
class LogTestBase extends PHPUnit_Framework_TestCase
{
	public $Data;

	public function setup()
	{
		$this->Data = new \Neuron\Log\Data( time(), 'Test log', \Neuron\Log\ILogger::DEBUG, 'DEBUG' );
	}
}
