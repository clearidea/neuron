<?php
/**
 * $x = new Processor()
 * 	->withValidator( 'test' )
 * 	->
 */
namespace Neuron\Data;

use Neuron\Data\Filter\IFilter;
use Neuron\Data\Validation\IValidator;

class Processor
{
	private $_Filters		= [];
	private $_Validators = [];
	private $_Data;

	public function __construct( $Data )
	{
		$this->_Data = $Data;
	}

	public function withValidator( IValidator $validator )
	{
		$this->_Validators[] = $validator;

		return $this;
	}

	public function withFilter( IFilter $filter )
	{
		$this->_Filters[] = $filter;

		return $this;
	}

	public function process()
	{
		foreach( $this->_Filters as $Filter )
		{
			$Filter->filter();
		}

		foreach( $this->_Validators as $Validator )
		{
			if( !$Validator->isValid() )
			{
				throw new \Exception( "Error validating" );
			}
		}
	}
}
