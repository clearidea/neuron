<?php


namespace Neuron\Data\Validation;

/**
 * Email address validation.
 */

class Email
	extends ValidatorBase
{
	protected function validate( $s )
	{
		return filter_var( $s, FILTER_VALIDATE_EMAIL ) ? true : false;
	}
}