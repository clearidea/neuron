<?php

class VersionTest extends PHPUnit\Framework\TestCase
{
	public function testLoadFromString()
	{
		$Version = new \Neuron\Data\Object\Version();

		$Version->loadFromString(
			"{\"major\":1,\"minor\":2,\"patch\":3}"
		);

		$this->assertEquals( 1, $Version->Major );
		$this->assertEquals( 2, $Version->Minor );
		$this->assertEquals( 3, $Version->Patch );
	}

	public function testFailLoadFromString()
	{
		$Version = new \Neuron\Data\Object\Version();

		$Pass = false;

		try
		{
			$Version->loadFromString(
				"meh"
			);
		}
		catch( \Exception $exception )
		{
			$Pass = true;
		}

		$this->assertTrue( $Pass );
	}
}
