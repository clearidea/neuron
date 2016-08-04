<?php

namespace Neuron\Setting;

class SettingManager
{
	private $_Source;

	/**
	 * @param Source\ISettingSource $Source
	 */

	public function __construct( Source\ISettingSource $Source )
	{
		$this->setSource( $Source );
	}

	/**
	 * @return mixed
	 */

	public function getSource()
	{
		return $this->_Source;
	}

	/**
	 * @param Source\ISettingSource $Source
	 */

	public function setSource( Source\ISettingSource $Source )
	{
		$this->_Source = $Source;
	}

	/**
	 * @param $sSection
	 * @param $sName
	 * @return mixed
	 */

	public function get( $sSection, $sName )
	{
		return $this->getSource()->get( $sSection, $sName );
	}

	/**
	 * @param $sSection
	 * @param $sName
	 * @param $sValue
	 */

	public function set( $sSection, $sName, $sValue )
	{
		$this->getSource()->set( $sSection, $sName, $sValue );
		$this->getSource()->save();
	}

	/**
	 * @return mixed
	 */

	public function getSectionNames()
	{
		return $this->getSource()->getSectionNames();
	}

	/**
	 * @param $sSection
	 * @return mixed
	 */

	public function getSectionSettingNames( $sSection )
	{
		return $this->getSource()->getSectionSettingNames( $sSection );
	}
}

?>
