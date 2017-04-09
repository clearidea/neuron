<?php

namespace Neuron\Data\Validation;

/**
 * Floating point validation.
 */

class FloatingPoint extends Base
{
	protected function validate( $float )
	{
		return is_float( $float );
	}
}
