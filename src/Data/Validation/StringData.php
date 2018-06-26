<?php

namespace Neuron\Data\Validation;

/**
 * Class StringData
 * @package Neuron\Data\Validation
 */
class StringData extends Base
{
	protected function validate( $string )
	{
		return is_string( $string );
	}
}
