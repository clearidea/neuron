<?php

namespace Neuron\Data\Filter;

class Get implements IFilter
{
	public function filterScalar( $data )
	{
		return filter_input( INPUT_GET, $data );
	}
}
