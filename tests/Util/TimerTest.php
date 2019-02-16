<?php

/**
 * Class TimerTest
 */
class TimerTest extends PHPUnit\Framework\TestCase
{
	public function testTimer()
	{
		$iOffset = 5;

		$Timer = new Neuron\Util\Timer( $iOffset );

		$iElapsed = $Timer->getElapsed();

		$this->assertEquals( $iElapsed, $iOffset );
	}

	public function testReset()
	{
		$Timer = new \Neuron\Util\Timer();

		$Timer->start();

		sleep( 2 );

		$Timer->reset();

		$this->assertEquals(
			$Timer->getElapsed(),
			0
		);
	}
}
