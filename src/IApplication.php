<?php
/**
 * Created by PhpStorm.
 * User: lee
 * Date: 10/23/15
 * Time: 10:22 AM
 */

namespace Neuron;


interface IApplication
	extends Log\ILogger
{
	public function getSetting( $sName, $sSection = 'default' );
	public function setSetting( $sName, $sValue, $sSection = 'default' );
}