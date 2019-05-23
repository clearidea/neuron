<?php

namespace Neuron\Parser;

interface IParser
{
	public function parse($Text, $UserData = array() );
}
