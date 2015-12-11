<?php

namespace Neuron\Log\Format;

use Neuron\Log;

/**
 * Formats log data as html.
 */

class HTML
	implements IFormat
{
	public function format( Log\Data $Data )
	{
		return '<small>'.date( "[Y-m-d G:i:s]", $Data->_TimeStamp )."</small> $Data->_sLevel $Data->_sText<br>";
	}
}
