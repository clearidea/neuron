<?php

namespace Neuron\Data\Validation;

/**
 * String string validation.
 */

class String extends ValidatorBase
{
	protected function validate( $string )
	{
		return is_string( $string );
	}
}
