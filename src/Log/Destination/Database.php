<?php

/*
 *
 */

namespace Neuron\Log\Destination;
use \Neuron\Log;

class Database
	extends DestinationBase
{
	private $_db;

	public function open( array $aParams )
	{
		$this->_db = $aParams[ 'database' ];
		return true;
	}

	public function close()
	{}

	public function write( $s, Log\Data $Data )
	{
		$Row = array(	'type' => $Data->_iLevel,
							'time' => date( "Y-m-d G:i:s", $Data->_TimeStamp ),
							'text' => $Data->_sText );

		$this->_db->setTable( 'event' );
		$this->_db->insert( $Row );
	}
};


?>
