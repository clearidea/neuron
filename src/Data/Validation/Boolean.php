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
		if( $this->_Loose )
		{
			if( $Value === 0 || $Value === 1 )
			{
				return true;
			}
		}

		return is_bool( $Value );
	}
}
