<?php

namespace Neuron\Data\Validation;

/**
 * Email address validation.
 */

class Email extends Base
{
	protected function validate( $email )
	{
		return filter_var( $email, FILTER_VALIDATE_EMAIL ) ? true : false;
	}
}
