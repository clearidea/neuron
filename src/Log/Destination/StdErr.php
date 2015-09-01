<?php
/**
 * Created by PhpStorm.
 * User: lee
 * Date: 8/18/15
 * Time: 5:43 PM
 */

namespace Neuron\Log\Destination;

use Neuron\Log;

class StdErr
	extends DestinationBase
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