<?php

namespace Neuron\Data\Validation;

/**
 * Class Positive
 * @package Neuron\Data\Validation
 */
class Positive extends Base
{
	public function validate( $Data )
	{
		return !( $Data < 0 );
	}
}
