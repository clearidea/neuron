<?php

namespace Neuron\Log\Destination;

use Neuron\Log;

/**
 * Outputs to stderr
 */

class StdErr extends DestinationBase
{
	public function open( array $aParams )
	{ return true; }

	public function close()
	{}

	public function write( $s, Log\Data $Data )
	{
		fwrite( STDERR, $s."\r\n" );
	}
}
