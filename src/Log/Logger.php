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

	public function setRunLevel( $iLevel )
	{ $this->_iRunLevel = $iLevel; }

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
	 * @param $text
	 * @param $iLevel
	 */

	public function log( $text, $iLevel )
	{
		if( $iLevel >= $this->getRunLevel() )
		{
			$this->getDestination()->log( $text, $iLevel );
		}
	}

	/**
	 * @param $text
	 */

	public function debug( $text )
	{
		$this->log( $text, self::DEBUG );
	}

	/**
	 * @param $text
	 */

	public function info( $text )
	{
		$this->log( $text, self::INFO );
	}

	/**
	 * @param $text
	 */

	public function warning( $text )
	{
		$this->log( $text, self::WARNING );
	}

	/**
	 * @param $text
	 */

	public function error( $text )
	{
		$this->log( $text, self::ERROR );
	}

	/**
	 * @param $text
	 */

	public function fatal( $text )
	{
		$this->log( $text, self::FATAL );
	}

};

?>
