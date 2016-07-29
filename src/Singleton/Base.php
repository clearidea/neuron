<?php

namespace Neuron\Singleton;

abstract class Base
	implements ISingleton
{
	public static function getInstance()
	{
		if( static::instance() )
		{
			$instance = static::instance();
			if( $instance instanceof self )
			{
				return static::instance();
			}
		}
		else
		{
			$sClass = get_called_class();
			$c = new $sClass;
			$c->serialize();
			return $c;
		}

		return null;
	}
}
