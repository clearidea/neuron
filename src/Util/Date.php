<?php



//////////////////////////////////////////////////////////////////////////
/// \addtogroup Date/Time
/// @{
//////////////////////////////////////////////////////////////////////////

namespace Neuron\Util;

use Neuron\Util;

class Date
{
	/**
	 * Turns a time difference into a text format.
	 *
	 * @param $time
	 * @parom $until
	 * @return string
	 */

	static function differenceAsText( $time, $until = null )
	{
		if( $until == null )
		{
			$until = time();
		}

		$time = $until - $time;
		$time = ( $time < 1 ) ? 1 : $time;

		$tokens = [
			31536000 => 'year',
			2592000  => 'month',
			604800   => 'week',
			86400    => 'day',
			3600     => 'hour',
			60       => 'minute',
			1        => 'second'
		];

		foreach( $tokens as $unit => $text )
		{
			if( $time < $unit )
			{
				continue;
			}
			$numberOfUnits = floor( $time / $unit );

			return $numberOfUnits.' '.$text.( ( $numberOfUnits > 1) ? 's' : '' );
		}
	}

	/**
	 * @param $iYear
	 * @return bool
	 */

	static function isLeapYear( $iYear )
	{
		return ( ( ( $iYear % 4 ) == 0 ) && ( ( ( $iYear % 100 ) != 0 ) || ( ( $iYear % 400 ) == 0 ) ) );
	}

	/**
	 * @param $iDays
	 * @param string $sDate
	 * @return bool|string - new date
	 */

	static function subtractDays( $iDays, $sDate = '' )
	{
		if( !$sDate )
		{
			$sDate = date( 'Y-m-d' );
		}

		$julian  = self::dateToJulian( $sDate );
		$julian -= $iDays;

		return Date::julianToDate( $julian );
	}

	//////////////////////////////////////////////////////////////////////////
	///
	/// Returns the current month starting date.
	///
	/// @return A string in yyyy-mm-dd mysql format.
	///
	//////////////////////////////////////////////////////////////////////////

	static function getCurrentMonthStartDate()
	{
		$date = date( "Y-m" );
		$date .= "-1";

		return $date;
	}

	//////////////////////////////////////////////////////////////////////////
	///
	/// Returns the number of days in the specified month.
	/// Being as it dosn't take the year as a parameter, it can't handle
	/// leap year.
	///
	/// @param $iMonth The month number - 1-12
	/// @param $iYear
	///
	/// @return
	///	1-31
	/// @SuppressWarnings(PHPMD)
	//////////////////////////////////////////////////////////////////////////

	/**
	 * @SuppressWarnings(PHPMD)
	 */

	static function getDaysInMonth( $iMonth, $iYear = null )
	{
		$days = 0;

		switch( $iMonth )
		{
			case 1:
				$days = 31;
				break;
			case 2:
				if( self::isLeapYear( $iYear ) )
				{
					$days = 29;
				}
				else
				{
					$days = 28;
				}
				break;
			case 3:
				$days = 31;
				break;
			case 4:
				$days = 30;
				break;
			case 5:
				$days = 31;
				break;
			case 6:
				$days = 30;
				break;
			case 7:
				$days = 31;
				break;
			case 8:
				$days = 31;
				break;
			case 9:
				$days = 30;
				break;
			case 10:
				$days = 31;
				break;
			case 11:
				$days = 30;
				break;
			case 12:
				$days = 31;
				break;
		}

		return $days;
	}

	//////////////////////////////////////////////////////////////////////////
	///
	/// Returns the end date for the current month.
	///
	/// @return
	/// A string in yyyy-mm-dd mysql format.
	//////////////////////////////////////////////////////////////////////////

	static function getCurrentMonthEndDate()
	{
		$date = date( "Y-m" );

		$days = Util\Date::getDaysInMonth( date( "n" ) );

		$date .= "-" . $days;

		return $date;
	}

	static function isSqlDateTime( $date_time )
	{
		if( $date_time[ 4 ] == '-' )
		{
			return $date_time;
		}         // already in sql format..

		if( strlen( $date_time ) == 0 )
		{
			return "0000-00-00";
		}

		return null;
	}

	//////////////////////////////////////////////////////////////////////////
	///
	/// Takes a date/time stringin dd-mm-yyyy format and returns it in
	/// yyyy-mm-dd format.
	///
	/// @param $date_time A string containing the date/time in dd-mm-yyyy ttt.. format.
	///
	/// @return A string in yyyy-mm-dd tt... mysql format.
	///
	//////////////////////////////////////////////////////////////////////////

	// 17-12-2005 10:10:27

	static function getMySqlDateTime( $date_time )
	{
		$sqldatetime = self::isSqlDateTime( $date_time );

		if( $sqldatetime )
		{
			return $sqldatetime;
		}

		$dt1 = substr( $date_time, 6, 4 );
		$dt1 .= "-";
		$dt1 .= substr( $date_time, 3, 2 );
		$dt1 .= "-";
		$dt1 .= substr( $date_time, 0, 2 );
		$dt1 .= " ";
		$dt1 .= substr( $date_time, 11, 8 );

		return $dt1;
	}

	//////////////////////////////////////////////////////////////////////////
	///
	/// Takes a date in dd-mm-yyyy format and returns it in yyyy-mm-dd format.
	///
	/// @param $date A string containing the date in dd-mm-yyyy format.
	///
	/// @return A string in yyyy-mm-dd mysql format.
	///
	//////////////////////////////////////////////////////////////////////////

	static function getMySqlDate( $date_time )
	{
		$sqldatetime = self::isSqlDateTime( $date_time );
		if( $sqldatetime )
			return $sqldatetime;

		$dt1 = substr( $date_time, 6, 4 );
		$dt1 .= "-";
		$dt1 .= substr( $date_time, 3, 2 );
		$dt1 .= "-";
		$dt1 .= substr( $date_time, 0, 2 );

		return $dt1;
	}

	//////////////////////////////////////////////////////////////////////////
	///
	/// Takes a date in dd-mm-yyyy format and returns a julian format date.
	///
	/// @param $date A string containing the date in dd-mm-yyyy format.
	///
	/// @return
	///	Julian date.
	//////////////////////////////////////////////////////////////////////////

	static function dateToJulian( $date )
	{
		$dformat = "-";

		// YYYY-MM-DD

		$date_parts = explode( $dformat, $date );
		$start_date = gregoriantojd( $date_parts[ 1 ], $date_parts[ 2 ], $date_parts[ 0 ] );
		return $start_date;
	}

	//////////////////////////////////////////////////////////////////////////
	///
	/// Takes a date in julian format and returns it in yyyy-mm-dd format.
	///
	/// @param $date A julian date.
	///
	/// @return
	///	A string in yyyy-mm-dd mysql format.
	//////////////////////////////////////////////////////////////////////////

	static function julianToDate( $dt1 )
	{
		$date = jdtogregorian( $dt1 );

		$date = strtotime( $date );

		return date( "Y-m-d", $date );
	}

	//////////////////////////////////////////////////////////////////////////
	///
	/// Computes the difference between two dates.
	///
	/// @param $endDate The end of the date range.
	/// @param $beginDate The beginning of the date range.
	///
	/// @return The difference between the two dates it days.
	///
	//////////////////////////////////////////////////////////////////////////

	static function diff( $endDate, $beginDate )
	{
		$start_date = Util\Date::dateToJulian( $beginDate );
		$end_date   = Util\Date::dateToJulian( $endDate );

		return $end_date - $start_date;
	}
}
