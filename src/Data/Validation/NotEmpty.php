<?php

namespace Neuron\Data\Validation;

/**
 * Class NotEmpty
 * @package Neuron\Data\Validation
 */
class NotEmpty extends Base
{
	protected function validate( $data )
	{
		return !empty( $data );
	}
}
