<?php

namespace Neuron\Data;

class Formatter
{
	public static function currency( $fNum )
	{
		return str_pad( number_format( $fNum, 2 ), 12, '_', STR_PAD_LEFT );
	}

	public static function time( $fNum )
	{
		return str_pad( number_format( $fNum, 2 ), 6, '_', STR_PAD_LEFT );
	}

}
