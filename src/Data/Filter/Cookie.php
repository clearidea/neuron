<?php

namespace Neuron\Data\Filter;

class Cookie implements IFilter
{
	public function filterScalar( $data )
	{
		return filter_input(INPUT_COOKIE, $data );
	}

	public function filterArray( $data )
	{
		return filter_input(INPUT_COOKIE, $data,FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
	}
}
