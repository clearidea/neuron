<?php

namespace Neuron\Data\Filter;


class Post
	implements IFilter
{
	public function filterScalar( $data )
	{
		return filter_input(INPUT_POST, $data, FILTER_DEFAULT, FILTER_REQUIRE_ARRAY );
	}
}
