<?php

namespace Neuron\Parser;

class Positional
	implements IParser
{
   /**
    * @param $sText
    * @param array $aLocations name, start, length
    * @return array
    */

   public function parse( $sText, $aLocations = array() )
   {
      $aResults = array();

      foreach( $aLocations as $aPos )
      {
         $aResults[ $aPos[ 'name' ] ] = trim( substr( $sText, $aPos[ 'start' ], $aPos[ 'length' ] ) );
      }

      return $aResults;
   }
}

