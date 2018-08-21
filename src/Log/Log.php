<?php

namespace Neuron\Log;

use Neuron\Log\Destination\Echoer;
use Neuron\Log\Format\PlainText;
use Neuron\Patterns\Singleton\Memory;

class Log extends Memory
{
	public $Logger;

	/**
	 * Creates and initializes the core logger if needed.
	 */
	public function initIfNeeded()
	{
		if( !$this->Logger )
		{
			$this->Logger = new LogMux();

			$this->Logger->addLog(
				new Logger(
					new Echoer(
						new PlainText()
					)
				)
			);

			$this->serialize();
		}
	}

	/**
	 * @param $text
	 * @param $iLevel
	 */
	public static function _log( $text, $iLevel )
	{
		$Log = self::getInstance();
		$Log->initIfNeeded();
		$Log->Logger->log( $text, $iLevel );
	}

	/**
	 * @param $iLevel
	 */
	public static function setRunLevel( $iLevel )
	{
		$Log = self::getInstance();
		$Log->initIfNeeded();
		$Log->Logger->setRunLevel( $iLevel );
		$Log->serialize();
	}

	/**
	 * @param $text
	 */
	public static function debug( $text )
	{
		self::_log( $text, ILogger::DEBUG );
	}

	/**
	 * @param $text
	 */
	public static function info( $text )
	{
		self::_log( $text, ILogger::INFO );
	}

	/**
	 * @param $text
	 */
	public static function warning( $text )
	{
		self::_log( $text, ILogger::WARNING );
	}

	/**
	 * @param $text
	 */
	public static function error( $text )
	{
		self::_log( $text, ILogger::ERROR );
	}

	/**
	 * @param $text
	 */
	public static function fatal( $text )
	{
		self::_log( $text, ILogger::FATAL );
	}
}
