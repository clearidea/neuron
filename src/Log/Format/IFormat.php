<?php

namespace Neuron\Log\Format;

use Neuron\Log;

/**
 * Interface IFormat
 */

interface IFormat
{
	public function format( Log\Data $data );
}
