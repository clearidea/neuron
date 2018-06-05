<?php

class PolicyTest extends PHPUnit_Framework_TestCase
{
	private $PolicyTraitObj;

	public function setUp()
	{
		$this->PolicyTraitObj = $this->getObjectForTrait( '\Neuron\Data\Validation\Policy' );

		$DateRange = new \Neuron\Data\Validation\DateWithinRange();

		$DateRange->setFormat( 'Y-m-d' )
			->setRange( new \Neuron\Data\Object\DateRange( '2000-01-01', '2020-01-02') );

		$this->PolicyTraitObj->addRule(
			'DateRule',
			$DateRange
		);
	}

	public function testDateRange()
	{
		$this->assertFalse(
			$this->PolicyTraitObj->isRuleValid( 'DateRule', '1970-04-08' )
		);
		$this->assertTrue(
			$this->PolicyTraitObj->isRuleValid( 'DateRule', '2001-01-01' )
		);
	}
}
