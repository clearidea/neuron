<?php

namespace Neuron\Data\Validation;

/**
 * Class Name
 * @package Neuron\Data\Validation
 *
 * Allows:
 * 	Upper case letters.
 * 	Lower case letters.
 * 	. and ,
 *
 */
class Name extends Base
{
	public function validate( $data )
	{
		return preg_match("/^[a-zA-Z,. ]*$/", $data ) == 1 ? true : false;
	}
}
