<?php

namespace Neuron\Data\Validation;

/**
 * Class Email
 * @package Neuron\Data\Validation
 */
class Email extends Base
{
	protected function validate( $email )
	{
		return filter_var( $email, FILTER_VALIDATE_EMAIL ) ? true : false;
	}
}
