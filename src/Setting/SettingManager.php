<?php

namespace Neuron\Setting;

class SettingManager
{
	private $_Source;

	public function getSource()
	{
		return $this->_Source;
	}

	public function setSource( Source\ISettingSource $Source )
	{
		$this->_Source = $Source;
	}

	public function get( $sSection, $sName )
	{
		return $this->getSource()->get( $sSection, $sName );
	}

	public function set( $sSection, $sName, $sValue )
	{
		$this->getSource()->set( $sSection, $sName, $sValue );
		$this->getSource()->save();
	}

	public function getSectionNames()
	{
		return $this->getSource()->getSectionNames();
	}

	public function getSectionSettingNames( $sSection )
	{
		return $this->getSource()->getSectionSettingNames();
	}
}

?>
