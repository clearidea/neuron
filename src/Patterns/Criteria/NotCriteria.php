<?php
/**
 * Created by PhpStorm.
 * User: lee
 * Date: 8/4/16
 * Time: 1:38 PM
 */

namespace Neuron\Patterns\Criteria;

use Neuron\Data\ArrayHelper;

class NotCriteria implements ICriteria
{
	private $_Criteria;

	/**
	 * NotCriteria constructor.
	 * @param ICriteria $Criteria
	 */

	public function __construct( ICriteria $Criteria )
	{
		$this->_Criteria = $Criteria;
	}

	/**
	 * @param array $entities
	 * @return array
	 */

	public function meetCriteria( array $entities )
	{
		$aNotCriteriaItems = $this->_Criteria->meetCriteria( $entities );

		$aNotEntities = $entities;

		foreach( $aNotCriteriaItems as $Item )
		{
			ArrayHelper::remove( $aNotEntities, $Item );
		}

		return $aNotEntities;
	}
}
