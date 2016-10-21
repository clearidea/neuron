<?php

namespace Neuron\Data;

class Formatter
{
	/**
	 * Format currency to n places.
	 * @param $fNum
	 * @param $iPlaces
	 * @return string
	 */
	public static function currency( $fNum, $iPlaces )
	{
		return str_pad( number_format( $fNum, 2 ), $iPlaces, '_', STR_PAD_LEFT );
	}

	/**
	 * Format time to n places.
	 * @param $fNum
	 * @param $iPlaces
	 * @return string
	 */
	public static function time( $fNum, $iPlaces )
	{
		return str_pad( number_format( $fNum, 2 ), $iPlaces, '_', STR_PAD_LEFT );
	}

}
