<?php

namespace Neuron\Log\Destination;

use Neuron\Log;

/**
 * Outputs to stderr
 */

class StdErr extends DestinationBase
{
	/**
	 * @param array $aParams
	 * @return bool
	 *
	 * @SuppressWarnings(PHPMD)
	 */

	public function open( array $aParams )
	{
		return true;
	}

	public function close()
	{}

	/**
	 * @param $s
	 * @param Log\Data $Data
	 * @return void
	 *
	 * @SuppressWarnings(PHPMD)
	 */

	public function write( $text, Log\Data $Data )
	{
		fwrite( STDERR, $text."\r\n" );
	}
}
