<?php

class AppMock extends \Neuron\Application\Base
{
	public function getVersion()
	{
		return '1';
	}

	protected function onRun()
	{
	}
}

class ApplicationTest extends PHPUnit\Framework\TestCase
{
	private $_App;

	public function setup()
	{
		$this->_App = new AppMock();
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

	public function testSettings()
	{
		$Source = new \Neuron\Setting\Source\Ini( 'examples/test.ini' );

		$this->_App->setSettingSource( $Source );

		$Value = $this->_App->getSetting( 'name', 'test' );

		$this->assertEquals(
			'value',
			$Value
		);
	}
}
