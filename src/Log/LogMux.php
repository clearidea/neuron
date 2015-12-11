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
	const LOG_ALL = 100;

	private $_aLogs = array();

	/**
	 * @param ILogger $Log
	 * @param int $iLevel
	 */

	public function addLog( ILogger $Log, $iLevel = 100 )
	{
		$this->_aLogs[ $iLevel ][] = $Log;
	}

	public function setRunLevel( $iLevel )
	{
		foreach( $this->getLogs() as $aLogs )
		{
			foreach( $aLogs as $level => $Log )
			{
				$Log->setRunLevel( $iLevel );
			}
		}
	}

	/**
	 * @return mixed
	 */

	public function getLogs()
	{
		return $this->_aLogs;
	}

	/**
	 * @param $s
	 * @param $iLevel
	 */

	public function log( $s, $iLevel )
	{
		foreach( $this->getLogs() as $level => $aLogs )
		{
			foreach( $aLogs as $Log )
			{
				if( $level == self::LOG_ALL || $level == $iLevel )
				{
					$Log->log( $s, $iLevel );
				}
			}
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

}
