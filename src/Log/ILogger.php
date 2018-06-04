<?php

/*
 *
 */

namespace Neuron\Log;

/**
 * Interface ILogger
 * @package Neuron\Log
 */

interface ILogger
{
	const DEBUG   = 0;		// Log all
	const INFO    = 10;		// Log informational
	const WARNING = 20;		// Log warning
	const ERROR   = 30;		// Log error
	const FATAL   = 40;		// Log fatal

	/**
	 * @param $text
	 * @param $iLevel
	 */
	public function log( $text, $iLevel );

	/**
	 * @param $iLevel
	 * @return mixed
	 */
	public function setRunLevel( $iLevel );

	/**
	 * @param $text
	 * @return mixed
	 */
	public function debug( $text );

	/**
	 * @param $text
	 * @return mixed
	 */
	public function info( $text );

	/**
	 * @param $text
	 * @return mixed
	 */
	public function warning( $text );

	/**
	 * @param $text
	 * @return mixed
	 */
	public function error( $text );

	/**
	 * @param $text
	 * @return mixed
	 */
	public function fatal( $text );
}
