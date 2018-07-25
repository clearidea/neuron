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

	/**
	 * Timer constructor.
	 * @param int $iTime used for testing purposes.
	 */
	public function __construct( $iTime = 0 )
	{
		$this->_StopTime = $iTime;
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
	 * @return int Number of seconds elapsed .
	 */
	public function getElapsed()
	{
		return $this->_StopTime - $this->_StartTime;
	}
}
