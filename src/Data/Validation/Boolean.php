<?php

namespace Neuron\Data\Validation;

/**
 * Requires a boolian.
 * @package Neuron\Data\Validation
 */
class Boolean extends Base
{
	protected function validate( $float )
	{
		return is_bool( $float );
	}
}
