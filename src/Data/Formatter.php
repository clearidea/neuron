<?php

namespace Neuron\Data;

class Formatter
{
	/**
	 * Format currency to n places.
	 * @param $Number
	 * @param $Format
	 * @return string
	 */

	public static function currency( $Number, string $Format = "%01.2f", $PadLength = 9 )
	{
		return
			"<pre style='display:inline; background-color: inherit; color:white; border: none;'>".
				str_pad(
					sprintf(
						$Format,
						round( $Number, 2 )
					),
					$PadLength,
					'_',
					STR_PAD_LEFT
				).
			"</pre>";
	}

	/**
	 * @param $DateTime
	 * @param string $Format
	 * @return false|string
	 */
	public static function dateTime( $DateTime, string $Format = 'Y-m-d g:i a' )
	{
		return date( $Format, strtotime( $DateTime ) );
	}

	/**
	 * @param string $DateTime
	 * @param string $Format
	 * @return false|string
	 */
	public static function dateOnly( string $DateTime, string $Format = 'Y-m-d' )
	{
		return date( $Format, strtotime( $DateTime ) );
	}

	/**
	 * @param string $DateTime
	 * @param string $Format
	 * @return false|string
	 */
	public static function timeOnly( string $DateTime, string $Format = 'g:i a' )
	{
		return date( $Format, strtotime( $DateTime ) );
	}
}
