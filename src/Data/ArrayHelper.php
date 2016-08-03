<?php

/**
 * Class ArrayHelper
 */

namespace Neuron\Data;

class ArrayHelper
{
	public static function getElement( array $aData, $sKey, $default = null )
	{
		if( array_key_exists( $sKey, $aData ) )
		{
			return $aData[ $sKey ];
		}

		if( $default )
		{
			return $default;
		}

		return null;
	}
}
