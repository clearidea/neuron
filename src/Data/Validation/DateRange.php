<?php

namespace Neuron\Data\Validation;

use Neuron\Data\Object;

class DateRange extends Date
{
	protected function validate( $Range )
	{
		// validate the format of start
		if( !parent::validate( $Range->Start ) )
		{
			return false;
		}

		// validate the format of end
		if( !parent::validate( $Range->End ) )
		{
			return false;
		}

		$startTS = strtotime( $Range->Start );
		$endTS   = strtotime( $Range->End );

		return ( $startTS < $endTS );
	}
}
