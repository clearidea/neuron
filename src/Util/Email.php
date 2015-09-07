<?php

namespace Neuron\Util;

class Email
{
	const EMAIL_TEXT = 0;
	const EMAIL_HTML = 1;

	private $_aToList		= array();
	private $_aCCList		= array();
	private $_aBCCList	= array();
	private $_aAttachList= array();

	private $_sHeaders;
	private $_sMimeBoundry;
	private $_sFrom;
	private $_sSubject;
	private $_sBody;

	private $_type = Email::EMAIL_HTML;

	//
	// Type..
	//

	public function setType( $type )
	{
		$this->_type = $type;
	}

	public function getType()
	{ return $this->_type; }

	//
	// To..
	//

	public function addTo( $sAddr )
	{
		array_push( $this->_aToList, $sAddr );
	}

	public function getToList()
	{
		return $this->_aToList;
	}

	//
	// CC..
	//

	public function addCC( $sAddr )
	{
		array_push( $this->_aCCList, $sAddr );
	}

	public function getCCList()
	{
		return $this->_aCCList;
	}

	//
	// BCC..
	//

	public function addBCC( $sAddr )
	{
		array_push( $this->_aBCCList, $sAddr );
	}

	public function getBCCList()
	{
		return $this->_aBCCList;
	}

	//
	// Attachments..
	//

	public function attachFile( $sFile )
	{
		array_push( $this->_aAttachList, $sFile );
	}

	public function getAttachList()
	{
		return $this->_aAttachList;
	}

	//
	// From..
	//

	public function setFrom( $sFrom )
	{
		$this->_sFrom = $sFrom;
	}

	public function getFrom()
	{
		return $this->_sFrom;
	}

	//
	// Subject..
	//

	public function setSubject( $sSubject )
	{
		$this->_sSubject = $sSubject;
	}

	public function getSubject()
	{
		return $this->_sSubject;
	}

	//
	// Body..
	//

	public function setBody( $sBody )
	{
		$this->_sBody = $sBody;
	}

	public function getBody()
	{
		return $this->_sBody;
	}

	//

	protected function getArrayList( $arr )
	{
		$sList = "";

		foreach( $arr as $s )
		{
			if( strlen( $sList ) )
				$sList .= ',';
			$sList .= $s;
		}
		return $sList;
	}

	protected function getAttachmentCode( $sName )
	{
		$file = fopen( $sName, 'rb' );
		$data = fread( $file, filesize( $sName ) );
		fclose( $file );

		$message = "This is a multi-part message in MIME format.\n\n" .
						 "--{$this->_sMimeBoundry}\n";

		if( $this->_type == Email::EMAIL_TEXT )
		{
			$message .= "Content-Type: text/plain; charset=\"iso-8859-1\"\n";
		}
		else if( $this->_type == Email::EMAIL_HTML )
		{
			$message .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
		}

		$message .= "Content-Transfer-Encoding: 7bit\n\n" .
						$this->_sBody . "\n\n";

		// Base64 encode the file data
		$data = chunk_split( base64_encode( $data ) );

		// Add file attachment to the message

		$fileatt_type = filetype( $sName );
		$fileatt_name = basename( $sName );

		$message .= "--{$this->_sMimeBoundry}\n" .
						"Content-Type: {$fileatt_type};\n" .
						" name=\"{$fileatt_name}\"\n" .
						"Content-Disposition: attachment;\n" .
						" filename=\"{$fileatt_name}\"\n" .
						"Content-Transfer-Encoding: base64\n\n" .
						$data . "\n\n" .
						"--{$this->_sMimeBoundry}--\n";

		return $message;
	}

	//
	// Send..
	//

	public function send()
	{
		$message = '';
		$headers = '';
		
		if( count( $this->_aAttachList ) )
		{
			$semi_rand = md5(time());
			$this->_sMimeBoundry = "==Multipart_Boundary_x{$semi_rand}x";

			$this->_sHeaders .= "Content-Type: multipart/mixed;\n" .
									" boundary=\"{$this->_sMimeBoundry}\"";

			foreach( $this->getAttachList() as $strName )
				$message .= $this->getAttachmentCode( $strName );
		}
		else
		{
			if( $this->getType() == Email::EMAIL_TEXT )
				$headers .= "Content-Type: text/plain; charset=\"iso-8859-1\"\n";
			else
				if ( $this->getType() == Email::EMAIL_HTML )
					$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";

			$message = $this->getBody();
		}

		// Send the message

		$headers .= "From: {$this->getFrom()}\nMIME-Version: 1.0\n";
		$headers .= "CC: ".$this->getArrayList( $this->getCCList() )."\n";
		$headers .= "BCC: ".$this->getArrayList( $this->getBCCList() )."\n";

		$ret = @mail(	$this->getArrayList( $this->getToList() ),
							$this->getSubject(),
							$message,
							$headers );

		return $ret;
	}
}

?>
