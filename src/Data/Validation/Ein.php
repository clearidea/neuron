<?php

namespace Neuron\Data\Validation;

class Ein extends Base
{
	public function validate( $data )
	{
		return preg_match("/^[0-9]{2}-[0-9]{7}$/", $data ) == 1 ? true : false;
	}
}
