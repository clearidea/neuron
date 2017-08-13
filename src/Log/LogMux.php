<?php

namespace Neuron\Log;

class LogMux implements ILogger
{
	private $_aLogs = [];

	/**
	 * @param ILogger $Log
	 */

	public function addLog( ILogger $Log )
	{
		$this->_aLogs[] = $Log;
	}

	/**
	 * Clears all attached logs.
	 */

	public function reset()
	{
		$this->_aLogs = [];
	}

	/**
	 * @return mixed
	 */

	public function getLogs()
	{
		return $this->_aLogs;
	}

	/**
	 * @param $iLevel
	 *
	 * Sync run levels for all loggers.
	 */

	public function setRunLevel( $iLevel ) : void
	{
		foreach( $this->getLogs() as $Log )
		{
			$Log->setRunLevel( $iLevel );
		}
	}

	//region ILogger
	/**
	 * @param $text
	 * @param $iLevel
	 */

	public function log( $text, $iLevel ) : void
	{
		foreach( $this->getLogs() as $Log )
		{
			$Log->log( $text, $iLevel );
		}
	}

	/**
	 * @param $text
	 */

	public function debug( $text ) : void
	{
		$this->log( $text, self::DEBUG );
	}

	/**
	 * @param $text
	 */

	public function info( $text ) : void
	{
		$this->log( $text, self::INFO );
	}

	/**
	 * @param $text
	 */

	public function warning( $text ) : void
	{
		$this->log( $text, self::WARNING );
	}

	/**
	 * @param $text
	 */

	public function error( $text ) : void
	{
		$this->log( $text, self::ERROR );
	}

	/**
	 * @param $text
	 */

	public function fatal( $text ) : void
	{
		$this->log( $text, self::FATAL );
	}
	//endregion

}
