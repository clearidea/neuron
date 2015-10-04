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
		if(!defined('STDOUT')) define('STDOUT', fopen('php://stdout', 'w'));

		fwrite( STDOUT, $s."\r\n" );
	}
}
