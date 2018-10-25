<?php

namespace Neuron\Util;

class WebHook implements IWebHook
{
	/**
	 * @param $Url
	 * @param array $Params
	 * @return mixed
	 */
	public function get( $Url, array $Params )
	{
		$ParamString = '';

		foreach( $Params as $Name => $Value )
		{
			if( $ParamString )
			{
				$ParamString .= '&';
			}

			$ParamString .= "$Name=$Value";
		}

		if( $ParamString )
		{
			$Url .= "?$ParamString";
		}

		$Handle = curl_init();

		curl_setopt( $Handle, CURLOPT_URL, $Url );
		curl_setopt( $Handle, CURLOPT_RETURNTRANSFER, true );

		curl_exec( $Handle );

		curl_close( $Handle );
	}

	/**
	 * @param $Url
	 * @param array $Params
	 * @return mixed
	 */
	public function post( $Url, array $Params )
	{
		$Handle = curl_init();

		curl_setopt_array(
			$Handle,
			array(
				CURLOPT_URL            => $Url,
				CURLOPT_POST           => true,
				CURLOPT_POSTFIELDS     => $Params,
				CURLOPT_RETURNTRANSFER => true,
			)
		);

		curl_exec( $Handle );

		curl_close( $Handle );
	}

	public function postJson( $Url, string $Json )
	{
		$Handle = curl_init( $Url );

		curl_setopt( $Handle, CURLOPT_CUSTOMREQUEST, "POST" );
		curl_setopt( $Handle, CURLOPT_POSTFIELDS, $Json );
		curl_setopt( $Handle, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $Handle, CURLOPT_HTTPHEADER,
			[
				'Content-Type: application/json',
				'Content-Length: ' . strlen( $Json )
			]
		);

		curl_exec( $Handle );
		curl_close( $Handle );
	}
}
