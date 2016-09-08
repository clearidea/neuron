<?php

class FormatterTest extends PHPUnit_Framework_TestCase
{
	public function testCurrency()
	{
		$text = \Neuron\Data\Formatter::currency( 1.99 );

		$this->assertEquals(
			strlen( $text ),
			12
		);
	}

	public function testTime()
	{
		$text = \Neuron\Data\Formatter::time( 4.33 );

		$this->assertEquals(
			strlen( $text ),
			6
		);
	}

}
