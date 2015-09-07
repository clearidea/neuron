<?php

namespace Neuron\Log\Destination;

use Neuron\Log;

/**
 * Outputs information using the php echo command. (non stdout)
 */

class Echoer
	extends DestinationBase
{
	public function open( array $aParams )
	{ return true; }

	public function close()
	{}

	public function write( $s, Log\Data $Data )
	{
		echo $s."\r\n";
	}
}