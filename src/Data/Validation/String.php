<?php

namespace Neuron\Data\Validation;

/**
 * String string validation.
 */

class String
	extends ValidatorBase
{
	protected function validate( $s )
	{
		return is_string( $s );
	}
}