<?php

namespace Neuron\Setting\Source;

class Memory implements ISettingSource
{
	private $_aSettings = array();

	public function get( $sSection, $sName)
	{
		if( array_key_exists( $sSection, $this->_aSettings ) )
		{
			$aSection = $this->_aSettings[ $sSection ];

			if( array_key_exists( $sName, $aSection ) )
			{
				return $aSection[ $sName ];
			}
		}
		return false;
	}

	public function set( $sSection, $sName, $sValue)
	{
		$this->_aSettings[ $sSection ][ $sName ] = $sValue;
	}

	public function getSectionNames()
	{
		return array_keys( $this->_aSettings );
	}

	public function getSectionSettingNames( $sSection )
	{
		return array_keys( $this->_aSettings[ $sSection ] );
	}

	public function save()
	{
		return false;
	}
}

?>
