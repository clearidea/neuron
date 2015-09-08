<?php

namespace Neuron\Log\Format;

use Neuron\Log;

/**
 * Interface IFormat
 */

interface IFormat
{
	public static function format( Log\Data $data );
}