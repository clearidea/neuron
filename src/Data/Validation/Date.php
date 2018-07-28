<?php

namespace Neuron\Data\Validation;

/**
 * Requires a date with a specific format. Defaults to Y-m-d
 * @package Neuron\Data\Validation
 */
class Date extends Base
{
	private $_sFormat = 'Y-m-d';

	protected function validate( $CheckDate )
	{
		$Date = \DateTime::createFromFormat( $this->_sFormat, $CheckDate );
		return $Date && $Date->format( $this->_sFormat ) == $CheckDate;
	}

	/**
	 * @param $sFormat - Specify the date format to validate to. Defaults to Y-m-d
	 * @return $this
	 */

	public function setFormat( $sFormat )
	{
		$this->_sFormat = $sFormat;

		return $this;
	}
}
