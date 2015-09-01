<?php
/**
 * Created by PhpStorm.
 * User: lee
 * Date: 8/26/15
 * Time: 4:13 PM
 */

namespace Neuron\Log;

class LoggableBase
	implements ILogger
{
	private $_Logger;

	public function __construct( Logger $Logger )
	{
		$this->_Logger = $Logger;
	}

	public function getLogger()
	{
		return $this->_Logger;
	}

	/**
	 * @param $s
	 * @param int $iLevel
	 *
	 * Writes to the log file. Defaults to debug mode.
	 * Data is only written to the log based on teh current run-level.
	 */

	public function log( $s, $iLevel = self::DEBUG )
	{
		$this->_Logger->log( get_class( $this ).': '.$s, $iLevel );
	}

}