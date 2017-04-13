<?php

namespace Neuron\Data\Object;

class DateRange
{
	public $Start;
	public $End;

	public function __construct( $Start, $End )
	{
		$this->Start = $Start;
		$this->End   = $End;
	}

}
