<?php
/**
 * Created by PhpStorm.
 * User: lee
 * Date: 12/20/15
 * Time: 8:21 AM
 */

namespace Neuron\Data\Filter;


class Get
	implements IFilter
{
	public function filterScalar( $data )
	{
		return filter_input( INPUT_GET, $data );
	}
}
