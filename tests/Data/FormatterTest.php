<?php

use Neuron\Data\Formatter;
use PHPUnit\Framework\TestCase;

class FormatterTest extends TestCase
{
	public function testTimeOnly()
	{
		$this->assertEquals(
			'1:30 pm',
			Formatter::timeOnly( '13:30')
		);
	}

	public function testDateTime()
	{
		$this->assertEquals(
			'2018-12-23 1:30 pm',
			Formatter::dateTime( '12/23/2018 13:30')
		);

	}

	public function testDateOnly()
	{
		$this->assertEquals(
			'2018-12-23',
			Formatter::dateOnly( '12/23/2018')
		);
	}
}
