<?php

namespace DecoupledApp\Interfaces\DataModel\Entities;

/**
 * All entity interfaces must extend this interface.
 * @author Abdulla Al-Qawasmeh
 *
 */
interface EntityInterface extends \JsonSerializable
{
	/**
	 * @return int The ID of the entity.
	 */
	function getId();
}
