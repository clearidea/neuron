<?php

namespace Neuron\Data\Validation;

class Name extends Base
{
	public function validate( $data )
	{
		return preg_match("/^[a-zA-Z,. ]*$/", $data ) == 1 ? true : false;
	}
}
