<?php

namespace Neuron;

/**
 * Command line applications are designed to only be executed from the context
 * of the command line.
 * Allows for easy addition and handling of command line parameters.
 */

abstract class CommandLineApplicationBase extends ApplicationBase
{
	private $_aHandlers;

	/**
	 * @return array - accessor for the parameter array.
	 */

	protected function getHandlers()
	{
		return $this->_aHandlers;
	}

	/**
	 * @param $sSwitch
	 * @param $sDescription
	 * @param $method
	 * @param bool|false $bParam
	 *
	 * Adds a handler for command line parameters.
	 * The switch is the parameter that causes the specified method to be called.
	 * If the bParam parameter is set to true, the token immediately follwing the
	 * switch on the command line will be passed as the parameter to the handler.
	 */

	protected function addHandler( $sSwitch, $sDescription, $method, $bParam = false )
	{
		$this->_aHandlers[ $sSwitch ] = [
			'description'	=> $sDescription,
			'method'			=> $method,
			'param'			=> $bParam
		];
	}

	/**
	 * Processes the argv array.
	 */

	protected function processParameters()
	{
		for( $c = 0; $c < count( $this->getParameters() ); $c++ )
		{
			$sParam = $this->getParameters()[ $c ];

			foreach( $this->getHandlers() as $sSwitch => $aInfo )
			{
				if( $sSwitch == $sParam )
				{
					if( $aInfo[ 'param' ] )
					{
						$c++;
						$param = $this->getParameters()[ $c ];
						$this->$aInfo[ 'method' ]( $param );
					}
					else
					{
						$this->$aInfo[ 'method' ]();
					}
				}
			}
		}
	}

	/**
	 * Activated by he --help parameter. Shows all configured switches and their
	 * hints.
	 */

	protected function help()
	{
		echo basename( $_SERVER['PHP_SELF'], '.php' )."\n";
		echo 'v'.$this->getVersion()."\n";
		echo "Switches:\n";
		$aHandlers = $this->getHandlers();
		ksort( $aHandlers );

		foreach( $aHandlers as $sSwitch => $aInfo )
		{
			echo str_pad( $sSwitch, 20 )."$aInfo[description]\n";
		}
	}

	protected function onStart()
	{
		if( !$this->isCommandLine() )
		{
			$this->log( "Application must be run from the command line.", Log\ILogger::FATAL );
			return false;
		}

		$this->addHandler( '--help', 'Help', 'help' );

		$this->processParameters();

		return parent::onStart();
	}
}
