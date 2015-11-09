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
	private $_aLogs = array();

	/**
	 * @param ILogger $Log
	 *
	 * todo: add ability to map loggers to different levels.
	 */

	public function addLog( ILogger $Log )
	{
		$this->_aLogs[] = $Log;
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
		foreach( $this->getLogs() as $Log )
		{
			$Log->log( $s, $iLevel );
		}
	}
}
