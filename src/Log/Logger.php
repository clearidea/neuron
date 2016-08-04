<?php

namespace Neuron\Log;

/**
 * Class for writing formatted output to specific destinations.
 */

class Logger implements ILogger
{
	private $_iRunLevel = ILogger::ERROR;
	private $_Destination;

	//////////////////////////////////////////////////////////////////////////

	/**
	 * @param Destination\DestinationBase $Dest
	 */

	public function setDestination( Destination\DestinationBase $Dest )
	{ $this->_Destination = $Dest; }

	/**
	 * @return mixed
	 */

	public function getDestination()
	{ return $this->_Destination; }

	/**
	 * @param $i
	 */

	public function setRunLevel( $i )
	{ $this->_iRunLevel = $i; }

	/**
	 * @return int
	 */

	public function getRunLevel()
	{ return $this->_iRunLevel; }

	//////////////////////////////////////////////////////////////////////////

	/**
	 * @param Destination\DestinationBase $Dest
	 */

	public function __construct( Destination\DestinationBase $Dest )
	{
		$this->setDestination( $Dest );
	}

	/**
	 * @return mixed
	 */

	public function open()
	{
		return $this->getDestination()->open();
	}

	/**
	 *
	 */

	public function close()
	{
		$this->getDestination()->close();
	}

	/**
	 * @param $s
	 * @param $iLevel
	 */

	public function log( $s, $iLevel )
	{
		if( $iLevel >= $this->getRunLevel() )
		{
			$this->getDestination()->log( $s, $iLevel );
		}
	}

	/**
	 * @param $s
	 */

	public function debug( $s )
	{
		$this->log( $s, self::DEBUG );
	}

	/**
	 * @param $s
	 */

	public function info( $s )
	{
		$this->log( $s, self::INFO );
	}

	/**
	 * @param $s
	 */

	public function warning( $s )
	{
		$this->log( $s, self::WARNING );
	}

	/**
	 * @param $s
	 */

	public function error( $s )
	{
		$this->log( $s, self::ERROR );
	}

	/**
	 * @param $s
	 */

	public function fatal( $s )
	{
		$this->log( $s, self::FATAL );
	}

};

?>
