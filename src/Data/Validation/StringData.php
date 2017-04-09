<?php

namespace Neuron\Data\Validation;

/**
 * StringData string validation.
 */

class StringData extends Base
{
	protected function validate( $string )
	{
		return is_string( $string );
	}
}
