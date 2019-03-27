<?php
/**
 * Created by PhpStorm.
 * User: lee
 * Date: 9/5/15
 * Time: 1:46 PM
 */

class PositionalTest extends PHPUnit\Framework\TestCase
{
	protected function setUp(): void
	{
	}

	public function testPass()
	{
		$Parser = new \Neuron\Parser\Positional();


		$aRet = $Parser->parse( "text1,text2,text3,text4",
			[
				[
					'name' 	=> 'col2',
					'start'	=> 6,
					'length'	=> 5
				]
			]);

		$this->assertEquals( 'text2', $aRet[ 'col2' ] );
	}

	protected function tearDown(): void
	{
	}
}
