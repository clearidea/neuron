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
	 * @param $s
	 * @param $iLevel
	 */

	public function log( $s, $iLevel );
}
?>
