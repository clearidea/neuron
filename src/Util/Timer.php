<?php

namespace Neuron\Util;

/**
 * Class for performing stopwatch functions.
 * @todo add laps.
 * @package Neuron\Util
 */
class Timer
{
	private $_StartTime = 0;
	private $_StopTime  = 0;
	private $_MaxTime   = 0;

	/**
	 * Timer constructor.
	 * @param int $iTime used for testing purposes.
	 */
	public function __construct( $iTime = 0 )
	{
		$this->_StopTime = $iTime;
	}

	public function setMaxTime( int $Max ) : Timer
	{
		$this->_MaxTime = $Max;

		return $this;
	}

	/**
	 * Start the timer.
	 */
	public function start()
	{
		$this->_StartTime = time();
	}

	/**
	 * Stop the timer.
	 */
	public function stop()
	{
		$this->_StopTime = time();
	}

	/**
	 * Reset all timer values.
	 */
	public function reset()
	{
		$this->_StartTime = 0;
		$this->_StopTime  = 0;
		$this->_MaxTime   = 0;
	}
	/**
	 * @return int Number of seconds elapsed .
	 */
	public function getElapsed()
	{
		if( $this->_StartTime && !$this->_StopTime )
		{
			return time() - $this->_StartTime;
		}

		return $this->_StopTime - $this->_StartTime;
	}

	public function execute( $Function )
	{
		$Result = $Function();

		return $Result;
	}
}
