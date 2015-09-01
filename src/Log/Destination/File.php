<?php

/*
 *
 */

namespace Neuron\Log\Destination;

use \Neuron\Log;

class File
	extends DestinationBase
{
	private $_sName;
	private $_hFile;

	public function open( array $aParams )
	{
		$this->_sName = $aParams[ 'file_name' ];

		$this->_hFile = @fopen( $this->_sName, 'a' );

		if( !$this->_hFile )
			return false;

		return true;
	}

	public function close()
	{
		if( $this->_hFile )
			fclose( $this->_hFile );
	}

	public function write( $s, Log\Data $Data )
	{
		fwrite(	$this->_hFile,
					"$s\r\n" );
	}
}
