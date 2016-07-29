<?php


namespace Neuron\Data\Validation;

/**
 * IPAddress validation.
 */

class IPAddress
	extends ValidatorBase
{
	protected function validate( $address )
	{
		return filter_var( $address, FILTER_VALIDATE_IP )? true : false;
	}
}
