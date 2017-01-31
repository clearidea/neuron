<?php

namespace Neuron\Data;

class StringData
{
	public $Value;

	/**
	 * StringData constructor.
	 * @param $String
	 */
	public function __construct( $String )
	{
		$this->Value = $String;
	}

	/**
	 * @return int
	 */
	public function length()
	{
		return strlen( $this->Value );
	}

	/**
	 * @param $Length
	 * @return string
	 */
	public function left( $Length )
	{
		return $this->mid( 0, $Length );
	}

	/**
	 * @param $Length
	 * @return string
	 */
	public function right( $Length )
	{
		return $this->mid( $this->length() - $Length, $this->length() );
	}

	/**
	 * @param $Start
	 * @param $End
	 * @return string
	 */
	public function mid( $Start, $End )
	{
		return substr( $this->Value, $Start, $End - $Start + 1 );
	}

	/**
	 * @return string
	 */
	public function trim()
	{
		return trim( $this->Value );
	}

	/**
	 * @return string
	 */
	public function deQuote()
	{
		return trim( $this->Value, '"' );
	}
}
