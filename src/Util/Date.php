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
	 * @param $iYear
	 * @return bool
	 */

	static function isLeapYear( $iYear )
	{
		return ((($iYear % 4) == 0) && ((($iYear % 100) != 0) || (($iYear %400) == 0)));
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

		$julian = self::dateToJulian( $sDate );
		$julian -= $iDays;

		return Date::julianToDate( $jd );
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
	/// @param $month The month number - 1-12
	///
	/// @return
	///	1-31
	/// @SuppressWarnings(PHPMD)
	//////////////////////////////////////////////////////////////////////////

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
					$days = 29;
				else
					$days = 28;
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

		$date .= "-".$days;

		return $date;
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
		if( $date_time[ 4 ] == '-' )
			return $date_time;			// already in sql format..

		if( strlen( $date_time ) == 0 )
			return "0000-00-00";

		$dt = substr( $date_time, 6, 4 );
		$dt .= "-";
		$dt .= substr( $date_time, 3, 2 );
		$dt .= "-";
		$dt .= substr( $date_time, 0, 2 );
		$dt .= " ";
		$dt .= substr( $date_time, 11, 8 );

		return $dt;
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
		if( $date_time[ 4 ] == '-' )
			return $date_time;			// already in sql format..

		if( strlen( $date_time ) == 0 )
			return "0000-00-00";

		$dt = substr( $date_time, 6, 4 );
		$dt .= "-";
		$dt .= substr( $date_time, 3, 2 );
		$dt .= "-";
		$dt .= substr( $date_time, 0, 2 );

		return $dt;
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

	static function dateToJulian( $dt )
	{
		$dformat = "-";

		// YYYY-MM-DD

		$date_parts = explode( $dformat, $dt );
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

	static function julianToDate( $dt )
	{
		$date = jdtogregorian( $dt );

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
		$start_date =  Util\Date::dateToJulian( $beginDate );
		$end_date	=	Util\Date::dateToJulian( $endDate );

		return $end_date - $start_date;
	}

	//////////////////////////////////////////////////////////////////////////
	///
	/// Takes a date/time string where the date format is uncertain and reformats
	/// the date to a mysql usable format.
	///
	/// @param $date_time A date/time string.
	///
	/// @return A date/time string in mysql format (YYYY-MM-DD tttttt...) (wrong)
	///
	//////////////////////////////////////////////////////////////////////////

	static function normalizeDate( $dt )
	{
		if( strlen( $dt < 6 ) )
			return false;

		if( 	$dt[ 0 ] != '-' &&
			$dt[ 1 ] != '-' &&
			$dt[ 2 ] != '-' &&
			$dt[ 3 ] != '-' )
		{
			// 2006-1-1
			if( $dt[ 6 ] == '-' )
			{
				$begin 	= substr( $dt, 0, 5 );
				$end		= substr( $dt, 5, strlen( $dt ) - 5 );

				// echo " 1begin $begin, end $end";

				$dt = $begin."0".$end;
			}

			// 2006-01-1
			if( !is_numeric( $dt[ 9 ] ) )
			{
				$begin 	= substr( $dt, 0, 8 );
				$end		= substr( $dt, 8, strlen( $dt ) - 8 );

				// echo " 2begin $begin, end $end";

				$dt = $begin."0".$end;
			}
		}
		else
		{
			// 1-1-2006
			if( $dt[ 1 ] == '-' )
				$dt = "0".$dt;

			// 01-1-2006
			if( $dt[ 4 ] == '-' )
			{
				$begin 	= substr( $dt, 0, 3 );
				$end		= substr( $dt, 3, strlen( $dt ) - 3 );

				$dt = $begin."0".$end;
			}
		}

		return $dt;
	}
}

?>
