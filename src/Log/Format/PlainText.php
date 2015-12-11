<?php

namespace Neuron\Log\Format;

use \Neuron\Log;

/**
 * Formats data as plain text.
 */

class PlainText
	implements IFormat
{
	private $_bShowDate;

	public function __construct( $bShowDate = true )
	{
		$this->_bShowDate = $bShowDate;
	}

	public function format( Log\Data $Data )
	{
		$s = '';

		if( $this->_bShowDate )
		{
			$s .= date( "[Y-m-d G:i:s]", $Data->_TimeStamp );
		}

		return  $s."[$Data->_sLevel] $Data->_sText";
	}
}

