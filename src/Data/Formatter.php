<?php

namespace Neuron\Data;

class Formatter
{
	/**
	 * Format currency to n places.
	 * @param $fNum
	 * @return string
	 */

	public static function currency( $fNum )
	{
		$s = "<pre style='display:inline; background-color: inherit; color:white; border: none;'>".str_pad(
				sprintf( "%01.2f", round($fNum, 2) ), 9, '_', STR_PAD_LEFT )."</pre>";
		return $s;
	}
	
	public static function dateOnly( $DateTime )
	{
		return date( 'Y-m-d', strtotime( $DateTime ) );
	}

	public static function timeOnly( $DateTime )
	{
		return date( 'g:i a', strtotime( $DateTime ) );
	}
}
