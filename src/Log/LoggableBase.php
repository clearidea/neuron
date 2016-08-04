<?php

namespace Neuron\Log;

class LoggableBase implements ILogger
{
	private $_Logger;

	/**
	 * @param ILogger $Logger
	 */

	public function __construct( ILogger $Logger )
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
	 * @param $iLevel
	 *
	 * Writes to the logger. Defaults to debug level.
	 * Data is only written to the log based on the loggers run-level.
	 */

	public function log( $text, $iLevel = self::DEBUG )
	{
		$this->_Logger->log( get_class( $this ).': '.$text, $iLevel );
	}

	/**
	 * @param $iLevel
	 */

	public function setRunLevel( $iLevel )
	{
		$this->_Logger->setRunLevel( $iLevel );
	}

	/**
	 * @param $s
	 */

	public function debug( $text )
	{
		$this->_Logger->debug( $text );
	}

	/**
	 * @param $s
	 */

	public function info( $s )
	{
		$this->_Logger->info( $s );
	}

	/**
	 * @param $s
	 */

	public function warning( $s )
	{
		$this->_Logger->warning( $s );
	}

	/**
	 * @param $s
	 */

	public function error( $s )
	{
		$this->_Logger->error( $s );
	}

	/**
	 * @param $s
	 */

	public function fatal( $s )
	{
		$this->_Logger->fatal( $s );
	}
}
