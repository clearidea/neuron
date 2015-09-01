<?php

/*
 *
 */

//////////////////////////////////////////////////////////////////////////////
//
// Outputs to screen in plaintext format.
//
//////////////////////////////////////////////////////////////////////////////

namespace Neuron\Log\Format;

use \Neuron\Log;

class PlainText
	implements IFormat
{
	public static function format( Log\Data $Data )
	{
		return date( "[Y-m-d G:i:s]", $Data->_TimeStamp ) . "[$Data->_sLevel] $Data->_sText";
	}
}

