<?php

namespace Neuron\Data\Validation;

/**
 * Integer validation.
 */

class Integer extends Base
{
	protected function validate( $integer )
	{
		if( is_int( $integer ) )
			return true;

		return ctype_digit( $integer );
	}
}
