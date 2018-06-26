<?php

namespace Neuron\Data\Validation;

/**
 * Class Url
 * @package Neuron\Data\Validation
 */
class Url extends Base
{
	protected function validate( $url )
	{
		return filter_var( $url, FILTER_VALIDATE_URL ) ? true : false;
	}
}
