<?php

namespace Neuron\Log;

use Neuron\Log\Destination\Echoer;
use Neuron\Log\Destination\StdOut;
use Neuron\Log\Format\PlainText;
use Neuron\Patterns\Singleton\Memory;

class Log extends Memory
{
	public $Logger;

	public function init()
	{
		$this->Logger = new \Neuron\Log\Logger(
			new Echoer( new PlainText() )
		);

		$this->serialize();
	}

	public static function log( $text, $iLevel )
	{
		self::getInstance()->Logger->log( $text, $iLevel );
	}

	public static function setRunLevel( $iLevel )
	{
		self::getInstance()->Logger->setRunLevel( $iLevel );
	}

	public static function debug( $text )
	{
		self::log( $text, ILogger::DEBUG );
	}

	public static function info( $text )
	{
		self::log( $text, ILogger::INFO );
	}

	public static function warning( $text )
	{
		self::log( $text, ILogger::WARNING );
	}

	public static function error( $text )
	{
		self::log( $text, ILogger::ERROR );
	}

	public static function fatal( $text )
	{
		self::log( $text, ILogger::FATAL );
	}
}
