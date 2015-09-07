<?php

namespace Neuron\Log\Destination;

use Neuron\Log;

/**
 * Outputs to stdout
 */

class StdOut
	extends DestinationBase
{
	public function open( array $aParams )
	{ return true; }

	public function close()
	{}

	public function write( $s, Log\Data $Data )
	{
		fwrite( STDOUT, $s."\r\n" );
	}
}