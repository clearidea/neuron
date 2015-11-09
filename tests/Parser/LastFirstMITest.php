<?php
/**
 * Created by PhpStorm.
 * User: lee
 * Date: 9/5/15
 * Time: 1:46 PM
 */

class LastFirstMITest extends PHPUnit_Framework_TestCase
{
	protected function setUp()
	{
	}

	public function testPass()
	{
		$Parser = new \Neuron\Parser\LastFirstMI();


		list( $sFirst, $sMiddle, $sLast ) = $Parser->parse( "Newman, Alfred E" );

		$this->assertEquals( $sFirst,		'Alfred' );
		$this->assertEquals( $sMiddle,	'E' );
		$this->assertEquals( $sLast,		'Newman' );
	}

	protected function tearDown()
	{
	}
}
