<?php

namespace Neuron\Data\Object;

use Neuron\Util\Date;

class DateRange
{
	public $Start;
	public $End;

	public function __construct( $Start, $End )
	{
		$this->Start = $Start;
		$this->End   = $End;
	}

	/**
	 * Returns the number of days between start and end.
	 * @return int
	 */
	public function getLengthInDays()
	{
		return Date::diff( $this->End, $this->Start );
	}
}
