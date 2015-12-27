<?php
/**
 * The goal of the IApplication interface is to provide access to basic application services:
 * - Logging
 * - Settings
 * - Registry
 */

namespace Neuron;


interface IApplication
	extends Log\ILogger
{
	public function getSetting( $sName, $sSection = 'default' );
	public function setSetting( $sName, $sValue, $sSection = 'default' );

	public function setRegistry( $name, $object );
	public function getRegistry( $name, $object );
}
