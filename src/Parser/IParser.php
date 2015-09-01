<?php
/**
 * Created by PhpStorm.
 * User: lee
 * Date: 6/30/15
 * Time: 2:57 PM
 */

namespace Neuron\Parser;

interface IParser
{
	public function parse( $sText, $UserData = array() );
}