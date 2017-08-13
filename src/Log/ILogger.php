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
	public function log( $text, $iLevel ) : void;

	/**
	 * @param $iLevel
	 * @return mixed
	 */
	public function setRunLevel( $iLevel ) : void;

	/**
	 * @param $text
	 * @return mixed
	 */
	public function debug( $text ) : void;

	/**
	 * @param $text
	 * @return mixed
	 */
	public function info( $text ) : void;

	/**
	 * @param $text
	 * @return mixed
	 */
	public function warning( $text ) : void;

	/**
	 * @param $text
	 * @return mixed
	 */
	public function error( $text ) : void;

	/**
	 * @param $text
	 * @return mixed
	 */
	public function fatal( $text ) : void;
}
