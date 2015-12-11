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

	public function debug( $s )
	{
		$this->debug( $s );
	}

	public function info( $s )
	{
		$this->info( $s );
	}

	public function warning( $s )
	{
		$this->warning( $s );
	}

	public function error( $s )
	{
		$this->error( $s );
	}

	public function fatal( $s )
	{
		$this->fatal( $s );
	}
}
