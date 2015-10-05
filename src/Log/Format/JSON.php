<?php

namespace Neuron\Log\Format;

use \Neuron\Log;

/**
 * Formats data as plain text.
 */

class JSON
	implements IFormat
{
	public static function format( Log\Data $Data )
	{
		$aData = [
			'date'	=> date( "[Y-m-d G:i:s]", $Data->_TimeStamp ),
			'level'	=> $Data->_sLevel,
			'text'	=> $Data->_sText
		];
		return json_encode( $aData );
	}
}
