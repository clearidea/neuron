<?php

namespace Neuron\Log\Destination;

use Neuron\Data\Validation\Url;
use Neuron\Log;
use Neuron\Util\IWebHook;

class WebHookPost extends DestinationBase
{
	private $_EndPoint;

	public function open( array $Params )
	{
		$Validator = new Url();

		if( !$Validator->isValid( $Params[ 'endpoint' ] ) )
		{
			throw new \Exception( $Params[ 'endpoint' ].' is not a valid url.' );
		}

		$this->_EndPoint = $Params[ 'endpoint' ];

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
		$Hook = new \Neuron\Util\WebHook();

		$Hook->post(
			$this->_EndPoint,
			[
				'level'      => $Data->Level,
				'level_text' => $Data->LevelText,
				'text'       => $Text,
				'timestamp'  => $Data->TimeStamp
			]
		);
	}
}
