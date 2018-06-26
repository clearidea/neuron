<?php
/**
 * Created by PhpStorm.
 * User: jeremiahyoder
 * Date: 2/22/17
 * Time: 9:10 AM
 */

namespace Neuron\Data\Validation;

/**
 * Class Time
 * @package Neuron\Data\Validation
 */
class Time extends Base
{
	private $_sFormat = 'g:i:s A';

	protected function validate( $CheckTime )
	{
		$Time = \DateTime::createFromFormat( $this->_sFormat, $CheckTime );
		return $Time && $Time->format( $this->_sFormat ) == $CheckTime;
	}

	/**
	 * @param $sFormat - Specify the date format to validate to. Defaults to g:i:s A
	 */

	public function setFormat( $sFormat )
	{
		$this->_sFormat = $sFormat;
	}
}
