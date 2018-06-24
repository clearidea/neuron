<?php

namespace Neuron\Data\Validation;

class Collection extends Base
{
	private $_Validators;
	private $_Failed;

	protected function validate( $Data )
	{
		$this->_Failed = [];

		array_walk( $this->_Validators, [ $this, 'validateItem' ], $Data );

		return count( $this->_Failed ) > 0 ? false : true;
	}

	public function validateItem( $Validator, $Name, $Data )
	{
		if( !$Validator->isValid( $Data ) )
		{
			$this->_Failed[] = $Name;
		}
	}

	public function add( $Name, IValidator $Validator )
	{
		$this->_Validators[ $Name ] = $Validator;

		return $this;
	}

	public function getFailedList()
	{
		return $this->_Failed;
	}
}
