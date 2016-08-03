<?php

/**
 * Created by PhpStorm.
 * User: lee
 * Date: 8/2/16
 * Time: 4:13 PM
 */

class ArrayHelperTest extends PHPUnit_Framework_TestCase
{
	public function testGetElement()
	{
		$aTest = [
			'one'   => 1,
			'two'   => 2,
			'three' => 3
		];

		$this->assertEquals( 1,    \Neuron\Data\ArrayHelper::getElement( $aTest, 'one' ) );
		$this->assertEquals( null, \Neuron\Data\ArrayHelper::getElement( $aTest, 'five' ) );
		$this->assertEquals( 20,   \Neuron\Data\ArrayHelper::getElement( $aTest, 'five', 20 ) );
	}
}
