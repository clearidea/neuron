<?php

namespace Neuron\Data\Validation;

/**
 * Class NotNull
 * @package Neuron\Data\Validation
 */
class NotNull extends Base
{
	protected function validate( $data )
	{
		return !is_null( $data );
	}
}
