<?php

namespace Neuron\Log;

class LoggableBase
	implements ILogger
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
	 * @param int $iLevel
	 */

	public function log( $s, $iLevel = self::DEBUG )
	{
		$this->_Logger->log( get_class( $this ).': '.$s, $iLevel );
	}

	public function setRunLevel( $iLevel )
	{
		$this->_Logger->setRunLevel( $iLevel );
	}

	public function debug( $s )
	{
		$this->_Logger->debug( $s );
	}

	public function info( $s )
	{
		$this->_Logger->info( $s );
	}

	public function warning( $s )
	{
		$this->_Logger->warning( $s );
	}

	public function error( $s )
	{
		$this->_Logger->error( $s );
	}

	public function fatal( $s )
	{
		$this->_Logger->fatal( $s );
	}
}
