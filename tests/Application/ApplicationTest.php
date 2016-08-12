<?php
/**
 *	http://stackoverflow.com/questions/190295/testing-abstract-classes
 */

class ApplicationTest extends PHPUnit_Framework_TestCase
{
	public function testRun()
	{
		$App = $this->getMockForAbstractClass( '\Neuron\Application\Base' );

		$App->expects( $this->any() )
			->method( 'onRun' )
			->will( $this->returnValue( true ) );

		$this->assertTrue( $App->run() );
	}
}
