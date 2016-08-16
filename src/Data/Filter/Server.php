<?php
namespace Neuron\Data\Filter;

class Server implements IFilter
{
	public function filterScalar( $data )
	{
		return filter_input( INPUT_SERVER, $data );
	}
}
