<?php

namespace Neuron\Data\Formatters;

class PhoneNumber implements IFormatter
{
    public function format( $Data ): string
    {
		 $Phone = preg_replace("/[^0-9]/", "", $Data );

		 if( strlen( $Phone ) == 7 )
		 {
			 $Pre   = substr( $Phone, 0, 3 );
			 $Post  = substr( $Phone, 3, 4 );
			 $Phone = "$Pre-$Post";
		 }
		 else if( strlen( $Phone ) == 10 )
		 {
			 $Area  = substr( $Phone, 0, 3 );
			 $Pre   = substr( $Phone, 3, 3 );
			 $Post  = substr( $Phone, 6, 4 );
			 $Phone = "($Area) $Pre-$Post";
		 }

		 return $Phone;
	 }
}
