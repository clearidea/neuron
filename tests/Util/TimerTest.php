<?php

/**
 * Class TimerTest
 */
class TimerTest extends PHPUnit_Framework_TestCase
{
	public function testTimer()
	{
		$iOffset = 5;

		$Timer = new Neuron\Util\Timer( $iOffset );

		$iElapsed = $Timer->getElapsed();

		$this->assertEquals( $iElapsed, $iOffset );
	}
}
