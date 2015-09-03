<?php
/**
 * Created by PhpStorm.
 * User: lee
 * Date: 3/31/15
 * Time: 1:48 PM
 */

namespace Neuron\Data\Validation;

/**
 * Class Float
 * @package Neuron\Data\Validation
 */

class Float
	extends Validator
{
	protected function validate( $f )
	{
		return is_int( $f + 0 );
	}
}