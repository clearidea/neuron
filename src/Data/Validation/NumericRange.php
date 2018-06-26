<?php

namespace Neuron\Data\Validation;

use Neuron\Data;

/**
 * Class NumericRange
 * @package Neuron\Data\Validation
 */
class NumericRange extends Base
{
	protected function validate( $data )
	{
		return ( $data->Minimum < $data->Maximum );
	}
}
