<?php

namespace Neuron\Data\Validation;

/**
 * Floating point validation.
 */

class Float extends Base
{
	protected function validate( $float )
	{
		return is_float( $float );
	}
}
