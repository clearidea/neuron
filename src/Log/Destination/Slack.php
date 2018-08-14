<?php

namespace Neuron\Log\Destination;

use Neuron\Log;

class Slack extends DestinationBase
{
	private $_Webhook;
	private $_Params;

	/**
	 * 'channel'     => $channel,
	 * 'username'    => $bot_name,
	 * 'text'        => $message,
	 * 'icon_emoji'  => $icon,
	 * 'attachments' => $attachments
	 *
	 * @param array $Params
	 * @return bool
	 */
	public function open( array $Params )
	{
		$this->_Webhook = $Params[ 'webhook_url' ];
		$this->_Params  = $Params[ 'params' ];
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
		$DataString = json_encode( $this->_Params );
		$Handle     = curl_init( $this->_Webhook );

		curl_setopt( $Handle, CURLOPT_CUSTOMREQUEST, "POST" );
		curl_setopt( $Handle, CURLOPT_POSTFIELDS, $DataString );
		curl_setopt( $Handle, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $Handle, CURLOPT_HTTPHEADER,
			[
				'Content-Type: application/json',
				'Content-Length: ' . strlen( $DataString )
			]
		);

		curl_exec( $Handle );
	}
}
