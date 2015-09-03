<?php
/**
 * Created by PhpStorm.
 * User: lee
 * Date: 8/18/15
 * Time: 5:43 PM
 */

namespace Neuron\Log\Destination;

use Neuron\Log;

/**
 * Class Null
 * @package Neuron\Log\Destination
 */

class Null
	extends DestinationBase
{
	public function open( array $aParams )
	{ return true; }

	public function close()
	{}

	public function write( $s, Log\Data $Data )
	{
		// asm nop;
	}
}