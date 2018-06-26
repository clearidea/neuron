<?php

namespace Neuron\Data\Validation;

/**
 * Class PhoneNumber
 * @package Neuron\Data\Validation
 */
class PhoneNumber extends Base
{
	public function validate( $data )
	{
		return preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $data ) == 1 ? true : false;
	}
}
