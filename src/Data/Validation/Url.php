<?php

namespace Neuron\Data\Validation;

/**
 * Url validation.
 */

class Url extends Base
{
	protected function validate( $url )
	{
		return filter_var( $url, FILTER_VALIDATE_URL ) ? true : false;
	}
}
