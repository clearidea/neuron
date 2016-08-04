<?php

/**
 * Created by PhpStorm.
 * User: lee
 * Date: 8/4/16
 * Time: 2:40 PM
 */

class CriteriaTest extends PHPUnit_Framework_TestCase
{
	public function testCriteria()
	{
		$aTest = [
			[
				'name' => 'one',
				'type' => 1
			],
			[
				'name' => 'two',
				'type' => 2
			],
			[
				'name' => 'three',
				'type' => 1
			],
		];

		$This = new \Neuron\Patterns\Criteria\MatchesOne();
		$That = new \Neuron\Patterns\Criteria\MatchesTwo();

		print_r( $This->_or( $That )->meetCriteria( $aTest ) );
	}
}
