<?php

namespace DecoupledApp\Interfaces\DataModel\Entities;

/**
 * All entity interfaces must extend this interface.
 * @author Abdulla Al-Qawasmeh
 * @link http://software-architecture-php.blogspot.com/2014/11/a-decoupled-application-in-php-putting.html
 *
 */
interface EntityInterface extends \JsonSerializable
{
	/**
	 * @return int The ID of the entity.
	 */
	function getId();
}
