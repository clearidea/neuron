<?php

namespace Neuron\Log\Destination;

use Neuron\Log;

// todo: webservice..

class WebService extends DestinationBase
{
	private $_sEndPoint;

	public function open( array $aParams )
	{
		$this->_sEndPoint = $aParams[ 'endpoint' ];
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
