<?php

namespace Neuron\Log\Destination;

use Neuron\Log;

/**
 * Performs to output. Use as dev/null.
 */

class Null
	extends DestinationBase
{
	public function open( array $aParams )
	{ return true; }

	public function close()
	{}

	public function write( $s, Log\Data $Data )
	{
		// asm nop;
	}
}