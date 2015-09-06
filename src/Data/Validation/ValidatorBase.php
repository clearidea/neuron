<?php

namespace Neuron\Data\Validation;

/**
 * Validator base class.
 */

abstract class ValidatorBase
{

	abstract protected function validate( $data );

	public function __construct()
	{}

	/**
	 * @param $data
	 * @return bool
	 */

	public function isValid( $data )
	{
		return $this->validate( $data );
	}
}