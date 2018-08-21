<?php

namespace Neuron\Log\Destination;

use Neuron\Log;

// todo: webservice..

class WebService extends DestinationBase
{
	private $_sEndPoint;

	public function open( array $Params )
	{
		$this->_sEndPoint = $Params[ 'endpoint' ];
		return true;
	}

	public function close()
	{
	}

	/**
	 * @param $text
	 * @param Log\Data $Data
	 *
	 * @SuppressWarnings(PHPMD)
	 */

	public function write( $text, Log\Data $Data )
	{
	}
}
