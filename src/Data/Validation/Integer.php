<?php

namespace Neuron\Data\Validation;

/**
 * Integer validation.
 */

class Integer
	extends ValidatorBase
{
	protected function validate( $i )
	{
		if( is_int( $i ) )
			return true;

		return ctype_digit( $i );
	}
}