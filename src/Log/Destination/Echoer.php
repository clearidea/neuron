<?php
/**
 * Created by PhpStorm.
 * User: lee
 * Date: 9/5/15
 * Time: 1:43 PM
 */

namespace Neuron\Log\Destination;

use Neuron\Log;

/**
 * Class Echo
 * @package Neuron\Log\Destination
 */

class Echoer
	extends DestinationBase
{
	public function open( array $aParams )
	{ return true; }

	public function close()
	{}

	public function write( $s, Log\Data $Data )
	{
		echo $s."\r\n";
	}
}