<?php

namespace Neuron\Parser;

class CSV
	implements IParser
{
	public function parse( $sText, $aColumns = array() )
	{
		$aResults = array();

		$aData = str_getcsv( $sText );

		$i = 0;

		foreach( $aColumns as $sColumn )
		{
			$aResults[ $sColumn ] = $aData[ $i ];
			++$i;
		}

		return $aResults;
	}
}

