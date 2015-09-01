<?php

/*
 *
 */

//////////////////////////////////////////////////////////////////////////////
//
// Core logging mechanism.
//
//////////////////////////////////////////////////////////////////////////////

namespace Neuron\Log;

class Logger
	implements ILogger
{
	private $_iRunLevel = ILogger::ERROR;
	private $_Destination;

	//////////////////////////////////////////////////////////////////////////

	public function setDestination( Destination\DestinationBase $Dest )
	{ $this->_Destination = $Dest; }

	public function getDestination()
	{ return $this->_Destination; }


	public function setRunLevel( $i )
	{ $this->_iRunLevel = $i; }

	public function getRunLevel()
	{ return $this->_iRunLevel; }

	//////////////////////////////////////////////////////////////////////////

	public function __construct( Destination\DestinationBase $Dest )
	{
		$this->setDestination( $Dest );
	}

	public function open()
	{
		return $this->getDestination()->open();
	}

	public function close()
	{
		$this->getDestination()->close();
	}

	function __destruct()
	{
		$this->close();
	}

	public function log( $s, $iLevel )
	{
		if( $iLevel >= $this->getRunLevel() )
		{
			$this->getDestination()->log( $s, $iLevel );
		}
	}
};

?>
