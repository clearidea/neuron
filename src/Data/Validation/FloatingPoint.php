<?php

namespace Neuron\Data\Validation;

/**
 * Class FloatingPoint
 * @package Neuron\Data\Validation
 */
class FloatingPoint extends Base
{
	protected function validate( $float )
	{
		return is_float( $float );
	}
}
