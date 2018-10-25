<?php

namespace Neuron\Data\Validation;

/**
 * Requires a floating point number.
 * @package Neuron\Data\Validation
 */
class FloatingPoint extends Base
{
	protected function validate( $Value )
	{
		return ( $Value == ( string)( float)$Value );
	}
}
