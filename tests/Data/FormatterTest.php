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

		$this->assertEquals(
			'2018-12-23 1:30 pm',
			Formatter::dateTime( '23/12/2018 1:30 pm')
		);
	}

	public function testDateOnly()
	{
		$this->assertEquals(
			'2018-12-23',
			Formatter::dateOnly( '12/23/2018')
		);

		$this->assertEquals(
			'2018-12-23',
			Formatter::dateOnly( '12-23-2018')
		);

		$this->assertEquals(
			'2018-12-23',
			Formatter::dateOnly( '2018-12-23')
		);

		$this->assertEquals(
			'2018-12-23',
			Formatter::dateOnly( '23/12/2018')
		);
	}
}
