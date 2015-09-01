<?php
/**
 * Created by PhpStorm.
 * User: lee
 * Date: 8/31/15
 * Time: 1:38 PM
 */

namespace Neuron\Util;


class System
{
	public static function isCommandLine()
	{
		return ( php_sapi_name() == 'cli' );
	}
}
