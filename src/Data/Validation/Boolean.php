<?php

namespace Neuron\Data\Validation;

/**
 * Requires a boolian.
 * @package Neuron\Data\Validation
 */
class Boolean extends Base
{
	private $_Loose;

	public function __construct( $Loose = false )
	{
		$this->_Loose = $Loose;
	}

	protected function validate( $Value )
	{
		$Result = false;

		if( $this->_Loose )
		{
			if( $Value === 0 || $Value === 1 )
			{
				$Result = true;
			}

			if( $Value === '0' || $Value == '1' )
			{
				$Result = true;
			}

			if( strtolower( $Value ) === 'false' || strtolower( $Value ) == 'true' )
			{
				$Result = true;
			}

		}
		else
		{
			$Result = is_bool( $Value );
		}

		return $Result;
	}
}
