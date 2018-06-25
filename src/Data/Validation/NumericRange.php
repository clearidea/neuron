<?php

namespace Neuron\Data\Validation;

use Neuron\Data;

class NumericRange extends Base
{
	protected function validate( $data )
	{
		return ( $data->Minimum < $data->Maximum );
	}
}
