<?php

use Neuron\Parser\FirstMI;

class FirstMITest extends PHPUnit_Framework_TestCase
{

	public function testParse()
	{
		$Parser = new \Neuron\Parser\LastFirstMI();

		list( $First, $Middle ) = $Parser->parse( "Alfred E" );

		$this->assertEquals( $First,	'Alfred' );
		$this->assertEquals( $Middle,	'E' );
	}

	public function testParseWithPeriod()
	{
		$Parser = new \Neuron\Parser\LastFirstMI();

		list( $First, $Middle ) = $Parser->parse( "Alfred E." );

		$this->assertEquals( $First,	'Alfred' );
		$this->assertEquals( $Middle,	'E' );
	}

}
