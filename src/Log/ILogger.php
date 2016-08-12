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
	const DEBUG 	= 0;		// Log all
	const INFO		= 10;		// Log informational
	const WARNING	= 20;		// Log warning
	const ERROR		= 30;		// Log error
	const FATAL		= 40;		// Log fatal

	/**
	 * @param $text
	 * @param $iLevel
	 */

	public function log( $text, $iLevel );
	public function setRunLevel( $iLevel );

	public function debug( $text );
	public function info( $text );
	public function warning( $text );
	public function error( $text );
	public function fatal( $text );
}
?>
