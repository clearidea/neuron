<?php
/**
 * Created by PhpStorm.
 * User: lee
 * Date: 8/3/16
 * Time: 10:55 AM
 */

namespace Neuron\Data\Validation;

class NotEmpty extends ValidatorBase
{
	protected function validate( $data )
	{
		return !empty( $data );
	}
}
