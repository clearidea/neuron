<?php

namespace Neuron\Data\Validation;

class Positive extends Base
{
	public function validate( $Data )
	{
		return !( $Data < 0 );
	}
}
