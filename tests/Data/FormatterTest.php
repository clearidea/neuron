<?php

class FormatterTest extends PHPUnit\Framework\TestCase
{
	public function testCurrency()
	{
		$text = \Neuron\Data\Formatter::currency( 1.99, 6 );

		$this->assertEquals(
			strlen( $text ),
			6
		);
	}

	public function testTime()
	{
		$text = \Neuron\Data\Formatter::time( 4.33, 6 );

		$this->assertEquals(
			strlen( $text ),
			6
		);
	}

}
