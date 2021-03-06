<?php

namespace DecoupledApp\DataModel\Entities;

/**
 * 
 * @author Abdulla Al-Qawasmeh
 *
 */
abstract class EntityBase implements \DecoupledApp\Interfaces\DataModel\Entities\EntityInterface
{
	/** @Id @Column(type="integer") @GeneratedValue **/
	protected $id;
	
	/**
	 * @see \DecoupledApp\Interfaces\DataModel\Entities\EntityInterface::getId()
	 */
	public function getId() {
		return $this->id;
	}
	
}