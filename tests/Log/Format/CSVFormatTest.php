<?php
require_once 'tests/Log/Format/LogTestBase.php';

/**
 * Created by PhpStorm.
 * User: lee
 * Date: 8/13/16
 * Time: 5:47 PM
 */
class CSVFormatTest extends \LogTestBase
{
	public function testFormat()
	{
		$Csv = new \Neuron\Log\Format\CSV();

		$out = $Csv->format( $this->Data );

		$aParts = explode( ',', $out );

		$this->assertEquals(
			count( $aParts ),
			3
		);
	}
}
