<?php

namespace Neuron\Log\Destination;

use Neuron\Log;

/**
 * Outputs to stdout
 */

class StdOut extends DestinationBase
{
	/**
	 * @param array $Params
	 * @return bool
	 *
	 * @SuppressWarnings(PHPMD)
	 */

	public function open( array $Params )
	{
		return true;
	}

	public function close()
	{}

	/**
	 * @param $text
	 * @param Log\Data $Data
	 * @return void
	 *
	 * @SuppressWarnings(PHPMD)
	 */

	public function write( $text, Log\Data $Data )
	{
		if( !defined( 'STDOUT') )
		{
			define( 'STDOUT', fopen( 'php://stdout', 'w' ) );
		}

		fwrite( STDOUT, $text."\r\n" );
	}
}
