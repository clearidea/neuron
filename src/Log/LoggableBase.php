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
	 * @param $text
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
	 * @param $text
	 */

	public function debug( $text )
	{
		$this->_Logger->debug( $text );
	}

	/**
	 * @param $text
	 */

	public function info( $text )
	{
		$this->_Logger->info( $text );
	}

	/**
	 * @param $text
	 */

	public function warning( $text )
	{
		$this->_Logger->warning( $text );
	}

	/**
	 * @param $text
	 */

	public function error( $text )
	{
		$this->_Logger->error( $text );
	}

	/**
	 * @param $text
	 */

	public function fatal( $text )
	{
		$this->_Logger->fatal( $text );
	}
}
