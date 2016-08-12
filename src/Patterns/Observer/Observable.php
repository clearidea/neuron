<?php

namespace Neuron\Patterns\Observer;

/**
 * Class Observable
 * @package Neuron\Patterns\Observer
 */

class Observable
{
	private $_aObservers = [];

	public function register( IObserver $Observer )
	{
		$this->_aObservers[] = $Observer;
	}

	/**
	 * @param mixed $params, ...
	 */

	public function notifyObservers( ...$params )
	{
		foreach( $this->_aObservers as $Observer )
		{
			$Observer->notify( $this, ...$params );
		}
	}
}
