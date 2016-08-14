<?php
/**
 *	http://stackoverflow.com/questions/190295/testing-abstract-classes
 */

class ApplicationTest extends PHPUnit_Framework_TestCase
{
	private $_App;

	public function setup()
	{
		$this->_App = $this->getMockForAbstractClass( '\Neuron\Application\Base' );

		$this->_App->expects( $this->any() )
			->method( 'onRun' )
			->will( $this->returnValue( true ) );
	}

	public function testRun()
	{
		$this->assertTrue( $this->_App->run() );
	}

	public function testRegistry()
	{
		$this->_App->setRegistryObject( 'test', '1234' );

		$result = $this->_App->getRegistryObject( 'test' );

		$this->assertEquals(
			$result,
			'1234'
		);
	}

	public function testIsCommandLine()
	{
		$this->assertTrue(
			$this->_App->isCommandLine()
		);
	}
}
