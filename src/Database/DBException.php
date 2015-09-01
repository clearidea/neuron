<?php
/**
 * Created by PhpStorm.
 * User: lee
 * Date: 3/6/15
 * Time: 10:37 AM
 */

namespace Neuron\Database;

class DBException extends \Exception
{
	private $_db;
	private $_strDetails;

	public function __construct( $db, $details )
	{
		$this->_db = $db;
		$this->_strDetails = $details;
	}

	public function getDB()
	{ return $this->_db; }

	public function getDetails()
	{ return $this->_strDetails; }
}
