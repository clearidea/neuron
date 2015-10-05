<?php

namespace Neuron\Log\Destination;

use Neuron\Log;

// todo: webservice..

class WebService
	extends DestinationBase
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

	public function write( $s, Log\Data $Data )
	{
	}
}
