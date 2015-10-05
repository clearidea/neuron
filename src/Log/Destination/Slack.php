<?php

namespace Neuron\Log\Destination;

use Neuron\Log;

// todo: slack..

class Slack
	extends DestinationBase
{
	private $_sApiToken;
	private $_sRoom;

	public function open( array $aParams )
	{
		$this->_sApiToken = $aParams[ 'api_token' ];
		$this->_sRoom		= $aParams[ 'room' ];
		return true;
	}

	public function close()
	{
	}

	public function write( $s, Log\Data $Data )
	{
	}
}
