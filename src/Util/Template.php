<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Template
 *
 * @author Synapsetech
 */

namespace Synapse\Util;

class Template 
{
	static function fromFile( $file, $fields )
	{
		$file = "templates/$file";

		if( file_exists( $file ) )
			$text = @file_get_contents( $file );
		else
			die( "Template not found: $file." );

		return self::fromText( $text, $fields );
	}

	static function fromText( $text, $fields )
	{
		foreach( $fields as $field => $data )
		{
			$find = '%'.$field.'%';

			$text = str_replace( $find, $data, $text );
		}

		return $text;
	}
}
