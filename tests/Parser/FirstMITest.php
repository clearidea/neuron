<?php

use Neuron\Parser\FirstMI;
use PHPUnit\Framework\TestCase;

class FirstMITest extends PHPUnit\Framework\TestCase
{

	public function testParse()
	{
		$Parser = new \Neuron\Parser\FirstMI();

		list( $First, $Middle ) = $Parser->parse( "Alfred E" );

		$this->assertEquals( $First,	'Alfred' );
		$this->assertEquals( $Middle,	'E' );
	}

	public function testParseWithPeriod()
	{
		$Parser = new \Neuron\Parser\FirstMI();

		list( $First, $Middle ) = $Parser->parse( "Alfred E." );

		$this->assertEquals( $First,	'Alfred' );
		$this->assertEquals( $Middle,	'E' );
	}

	public function testFirstOnly()
	{
		$Parser = new \Neuron\Parser\FirstMI();

		list( $First, $Middle ) = $Parser->parse( "Alfred" );

		$this->assertEquals( $First,	'Alfred' );
		$this->assertEquals( $Middle,	'' );
	}
}
