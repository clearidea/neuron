<?php

namespace Neuron\Log;

/**
 * Class Data
 * @package Neuron\Log
 */

class Data
{
	public $_TimeStamp;
	public $_sText;
	public $_iLevel;
	public $_sLevel;

	/**
	 * @param $TimeStamp
	 * @param $sText
	 * @param $iLevel
	 * @param $sLevel
	 */

	public function __construct( $TimeStamp, $sText, $iLevel, $sLevel )
	{
		$this->_TimeStamp	= $TimeStamp;
		$this->_sText		= $sText;
		$this->_iLevel		= $iLevel;
		$this->_sLevel		= $sLevel;
	}
};


?>
