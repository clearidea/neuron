<?php

namespace Neuron\Data\Validation;

/**
 * Integer validation.
 */

class Integer extends ValidatorBase
{
	protected function validate( $integer )
	{
		if( is_int( $integer ) )
			return true;

		return ctype_digit( $integer );
	}
}
