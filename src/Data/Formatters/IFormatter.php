<?php

namespace Neuron\Data\Formatters;

interface IFormatter
{
	public function format( $Data ) : string;
}
