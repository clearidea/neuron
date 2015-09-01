<?php
/**
 * Created by PhpStorm.
 * User: lee
 * Date: 3/31/15
 * Time: 1:48 PM
 */

namespace Neuron\Data\Validation;

class String
	extends Validator
{
	protected function validate( $s )
	{
		return is_string( $s );
	}
}