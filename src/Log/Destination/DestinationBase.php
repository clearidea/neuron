<?php

/*
 *
 */

//////////////////////////////////////////////////////////////////////////////
//
// Abstract base class for the device level output destinations.
//
//////////////////////////////////////////////////////////////////////////////

namespace Neuron\Log\Destination;

use \Neuron\Log;
use \Neuron\Log\Format;

abstract class DestinationBase
{
	private $_Format;

	public function getLevelText( $i )
	{
		switch( $i )
		{
			case Log\ILogger::DEBUG:
				return "Debug";

			case Log\ILogger::INFO:
				return "Info";

			case Log\ILogger::WARNING:
				return "Warning";

			case Log\ILogger::ERROR:
				return "Error";

			case Log\ILogger::FATAL:
				return "Fatal";

			default:
				return "Unknown";
		}
	}

	public function __construct( Format\IFormat $Format )
	{
		$this->setFormat( $Format );
	}

	public function setFormat( Format\IFormat $Format )
	{ $this->_Format = $Format; }

	protected abstract function write( $s, Log\Data $Data );

	public abstract function open( array $aParams );

	public function log( $s, $iLevel )
	{
		$Log = new Log\Data( time(), $s, $iLevel, $this->getLevelText( $iLevel ) );
		$s = $this->_Format->format( $Log );

		$this->write( $s, $Log );
	}
}
