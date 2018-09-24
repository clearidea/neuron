<?php

namespace Neuron\Data\Object;

class Version
{
	public $Major;
	public $Minor;
	public $Patch;

	/**
	 * Version constructor.
	 */
	public function __construct()
	{
		$this->Major = 0;
		$this->Minor = 0;
		$this->Patch = 0;
	}

	/**
	 * @param $Data
	 * @throws \Exception
	 */
	public function loadFromString( $Data )
	{
		$Json = json_decode( $Data,true );

		if( $Json === null )
		{
			throw new \Exception( "Unable to parse json from '$Data'" );
		}

		$this->Major = $Json[ 'major' ];
		$this->Minor = $Json[ 'minor' ];
		$this->Patch = $Json[ 'patch' ];
	}

	/**
	 * @param string $File
	 * @throws \Exception
	 */
	public function loadFromFile( $File = 'version.json' )
	{
		if( !file_exists( $File ) )
		{
			throw new \Exception( "Cannot find version file '$File'" );
		}

		$Data = file_get_contents( $File );

		$this->loadFromString( $Data );
	}
}
