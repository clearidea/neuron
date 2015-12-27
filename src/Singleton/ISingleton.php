<?php

namespace Neuron\Singleton;

interface ISingleton
{
	function serialize();
	static function invalidate();
	static function instance();
}
