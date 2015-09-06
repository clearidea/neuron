<?php

namespace Neuron\Data\Validation;

/**
 * Floating point validation.
 */

class Float
	extends ValidatorBase
{
	protected function validate( $f )
	{
		return is_float( $f );
	}
}