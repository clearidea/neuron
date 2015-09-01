<?php
/**
 * Created by PhpStorm.
 * User: lee
 * Date: 3/6/15
 * Time: 10:37 AM
 */

namespace Neuron\Database;

abstract class DBCredentials
{
	abstract public function getMachine();
	abstract public function getName();
	abstract public function getUser();
	abstract public function getPassword();
}

