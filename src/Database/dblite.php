<?php
/*******************************************************************
 *
 * Created by Clear Idea Labs, LLC
 *
 * 2627 Mall Drive
 * Sarasota, FL 34321
 *
 * 800-958-9047
 * info@clearidea.us
 * http://www.clearidea.us
 *
 ********************************************************************
 *
 *
 *******************************************************************/

////////////////////////////////////////////////////////////////////
///
/// @file
/// @brief Database related technology.

////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////
/// \addtogroup Database
/// Functions to simplify database access.
/// @{
//////////////////////////////////////////////////////////////////////////

/// Exception class used for database problems.

namespace Neuron\Database;

use \Neuron\Log;

/// Simple database wrapper class for mysql


class DBLite
{
	private $_logger;

	private static $_handle;
	public $_strLastQuery = '';

	private $_tableName;

	public function setTable( $table )
	{
		$this->_tableName = $table;
	}

	/// Returns the last query used.

	public function getLastQuery()
	{ return $this->_strLastQuery; }

	/// Returns the database connection handle

	public function getHandle()
	{
		return self::$_handle;
	}

	/// Called when an error occurs. Throws a CIDBException.

	protected function error( $s )
	{
		$this->_logger->log( Log\ILogger::ERROR, $s );
		$this->_logger->log( Log\ILogger::ERROR, $this->getErrorInfo() );
		throw new DBException( $this, $s );
	}

	/// Constructor

	public function __construct( Log\Logger $logger )
	{
		$this->_logger = $logger;
	}

	public function init( DBCredentials $credentials )
	{
		if (!isset( self::$_handle ) )
		{
			$db = mysqli_connect( $credentials->getMachine(),
										 $credentials->getUser(),
										 $credentials->getPassword() );

			if( !$db )
				$this->error( "Could not connect to {$credentials->getMachine()} using {$credentials->getUser()}." );

			mysqli_select_db( $db, $credentials->getName() );

			self::$_handle = $db;
		}
	}

	/// Executes a query. Returns a query handle on success or throws a CIDBException

	public function query( $q )
	{
		$this->_strLastQuery = $q;

		$r = mysqli_query( $this->getHandle(), $this->_strLastQuery );

		if( $r )
			return $r;

		$this->_logger->log( Log\ILogger::DEBUG, "Query: $q" );
		$this->error( 'Query failed.' );
		return false;
	}

	/// Returns an associative array of rows or throws a CIDBException.

	public function queryGetRows( $q )
	{
		$result = $this->query( $q );

		if( !$result )
			return false;

		$rows = array();

		while( $myrow = mysqli_fetch_assoc( $result ) )
		{
			array_push( $rows, $myrow );
		}

		return $rows;
	}

	/// Returns a single row instead of an entire array.

	public function queryGetSingleRow( $q )
	{
		$rows = $this->queryGetRows( $q );

		if( !$rows )
			return false;

		return $rows[ 0 ];
	}

	/// Returns an escaped version of the string parameter.


    public function esc( $s )
	{
		 if( is_array( $s ) )
		 {
			 echo "ESC ERROR: ";
			 die( print_r( $s ) );
		 }
		return mysqli_real_escape_string( $this->getHandle(), stripslashes( $s ) );
        //return $this->_CleanQuery($s);
	}

	/// Returns information related to the last error.

	public function getErrorInfo()
	{
		return mysqli_error( $this->getHandle() );
	}

	/// Returns the id of the last inserted record.

	public function getLastInsertId()
	{
		return mysqli_insert_id( $this->getHandle() );
	}


	public function insert( $columns )
	{
		$q = sprintf( "INSERT INTO `$this->_tableName` (" );

		foreach( $columns as $col => $data )
			$q .= "`$col`,";

		// Chop off the last comma..

		$q = substr( $q, 0, strlen( $q ) - 1 );

		$q .= ") VALUES(";

		foreach( $columns as $col => $data )
		{
			if( strlen( $data ) && $data[ 0 ] == '@' )
			{
				$data = substr( $data, 1, strlen( $data ) - 1 );
				$q .= $data.",";
			}
			else
				$q .= "'".$this->esc( $data )."',";
		}

		$q = substr( $q, 0, strlen( $q ) - 1 );

		$q .= ")";

		return $this->query( $q );
	}

	public function update( $columns, $filter )
	{
		$q = "UPDATE `$this->_tableName` SET ";

		foreach( $columns as $col => $data )
		{
			if( strlen( $data ) && $data[ 0 ] == '@' )
			{
				$data = substr( $data, 1, strlen( $data ) - 1 );
				$q .= "`$col`='$data',";
			}
			else
				$q .= "`$col`='".$this->esc( $data )."',";
		}

		// Chop off the last comma..

		$q = substr( $q, 0, strlen( $q ) - 1 );
		$q .= " WHERE ".$filter;

		return $this->query( $q );
	}

	public function delete( $filter )
	{
		$q = "DELETE FROM `$this->_tableName` WHERE $filter";
		return $this->query( $q );
	}
}

//////////////////////////////////////////////////////////////////////////
/// @}
//////////////////////////////////////////////////////////////////////////

?>
