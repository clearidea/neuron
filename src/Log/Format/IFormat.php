<?php
/**
 * Created by PhpStorm.
 * User: lee
 * Date: 8/18/15
 * Time: 4:44 PM
 */

namespace Neuron\Log\Format;

use \Neuron\Log;

interface IFormat
{
	public static function format( Log\Data $data );
}