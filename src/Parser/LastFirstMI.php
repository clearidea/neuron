<?php
/**
 * Created by PhpStorm.
 * User: lee
 * Date: 11/9/15
 * Time: 3:20 PM
 */

namespace Neuron\Parser;


class LastFirstMI implements IParser
{
	/**
	 * Parses Last, First M
	 *
	 * @param $sText
	 * @param array unused
	 * @return array first, middle, last
	 */

	public function parse( $sText, $aLocations = array() )
	{
		$aName = explode( ',', $sText );

		$sFirst = trim( $aName[ 1 ] );
		$sMiddle = '';

		$aFirstMiddle = explode( ' ', $sFirst );

		if( count( $aFirstMiddle ) > 1 )
		{
			$aFirstMiddle[ 1 ] = trim( $aFirstMiddle[ 1 ] );

			if( strlen( $aFirstMiddle[ 1 ] ) == 1 )
			{
				$sFirst = $aFirstMiddle[ 0 ];
				$sMiddle = $aFirstMiddle[ 1 ];
			}
		}

		$sLast = trim( $aName[ 0 ] );


		return [ $sFirst, $sMiddle, $sLast ];
	}
}
