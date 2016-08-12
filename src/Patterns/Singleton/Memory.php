<?php

namespace Neuron\Patterns\Singleton;

class Memory extends Base
{
	static $_instance;

	public function serialize()
	{
		static::$_instance = $this;
	}

	public static function invalidate()
	{
		static::$_instance = false;
	}

	public static function instance()
	{
		return static::$_instance;
	}
}
?>
