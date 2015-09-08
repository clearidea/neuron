<?php

namespace Neuron\Log;

class LoggableBase
	implements ILogger
{
	private $_Logger;

	/**
	 * @param Logger $Logger
	 */

	public function __construct( Logger $Logger )
	{
		$this->_Logger = $Logger;
	}

	/**
	 * @return Logger
	 */

	public function getLogger()
	{
		return $this->_Logger;
	}

	/**
	 * @param $s
	 * @param int $iLevel
	 */

	public function log( $s, $iLevel = self::DEBUG )
	{
		$this->_Logger->log( get_class( $this ).': '.$s, $iLevel );
	}

}