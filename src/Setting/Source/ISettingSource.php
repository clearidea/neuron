<?php

/*
 *
 */

namespace Neuron\Setting\Source;
cd
interface ISettingSource
{
	public function get( $sSection, $sName );
	public function set( $sName, $sSection, $sValue );
	public function getSectionNames();
	public function getSectionSettingNames( $sSection );

	public function save();
}
?>
