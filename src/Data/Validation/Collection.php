<?php

namespace Neuron\Data\Validation;

class Collection extends Base
{
	private $_Validators;
	private $_Failed;

	protected function validate( $data )
	{
		$this->_Failed = [];

		$Result = true;

		foreach( $this->_Validators as $Name => $Validator )
		{
			if( !$Validator->isValid( $data ) )
			{
				$this->_Failed[] = $Name;

				$Result = false;
			}
		}

		return $Result;
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
