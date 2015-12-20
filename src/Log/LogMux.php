<?php
/**
 * Created by PhpStorm.
 * User: lee
 * Date: 9/29/15
 * Time: 10:59 AM
 */

namespace Neuron\Log;


class LogMux
	implements ILogger
{
	private $_aLogs = [];

	/**
	 * @param ILogger $Log
	 * @param int $iLevel
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

	public function setRunLevel( $iLevel )
	{
		foreach( $this->getLogs() as $Log )
		{
			$Log->setRunLevel( $iLevel );
		}
	}

	//region ILogger
	/**
	 * @param $s
	 * @param $iLevel
	 */

	public function log( $s, $iLevel )
	{
		foreach( $this->getLogs() as $Log )
		{
			$Log->log( $s, $iLevel );
		}
	}

	/**
	 * @param $s
	 */

	public function debug( $s )
	{
		$this->log( $s, self::DEBUG );
	}

	/**
	 * @param $s
	 */

	public function info( $s )
	{
		$this->log( $s, self::INFO );
	}

	/**
	 * @param $s
	 */

	public function warning( $s )
	{
		$this->log( $s, self::WARNING );
	}

	/**
	 * @param $s
	 */

	public function error( $s )
	{
		$this->log( $s, self::ERROR );
	}

	/**
	 * @param $s
	 */

	public function fatal( $s )
	{
		$this->log( $s, self::FATAL );
	}
	//endregion

}
