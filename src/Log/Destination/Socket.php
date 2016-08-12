<?php

namespace Neuron\Log\Destination;

use Neuron\Log;

class Socket extends DestinationBase
{
	private $_sAddress;

	/**
	 * @param array $aParams
	 * @return bool
	 */

	public function open( array $aParams )
	{
		$this->_sAddress = $aParams[ 'ip_address' ];

		return true;
	}

	public function close()
	{
	}

	/**
	 * @param $sMsg
	 * @throws \Exception
	 */

	protected function error( $sMsg )
	{
		$errorcode = socket_last_error();
		$errormsg = socket_strerror($errorcode);

		throw new \Exception( "$sMsg: [$errorcode] $errormsg\n" );
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
		if( !($sock = socket_create(AF_INET, SOCK_STREAM, 0)))
		{
			$this->error( 'Could not create socket' );
		}

		if( !socket_connect($sock , $this->_sAddress , 80))
		{
			$this->error( 'Could not connect' );
		}

		if( !socket_send ( $sock , $text, strlen( $text ) , 0))
		{
			$this->error( 'Write failed' );
		}
	}
}
