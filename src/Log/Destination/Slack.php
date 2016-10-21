<?php

namespace Neuron\Log\Destination;

use Neuron\Log;

// todo: slack..

class Slack extends DestinationBase
{
	private $_sApiToken;
	private $_sRoom;

	/**
	 * Call with [ 'api_token' => '', 'room' => '' ]
	 * @param array $aParams
	 * @return bool
	 */
	public function open( array $aParams )
	{
		$this->_sApiToken = $aParams[ 'api_token' ];
		$this->_sRoom     = $aParams[ 'room' ];
		return true;
	}

	public function close()
	{
	}

	/**
	 * @param $text
	 * @param Log\Data $Data
	 * @return void
	 *
	 * @SuppressWarnings(PHPMD)
	 */

	public function write( $text, Log\Data $Data )
	{
	}
}
