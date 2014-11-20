<?php

namespace DecoupledApp\DataModel\Entities;

abstract class EntityBase implements \DecoupledApp\Interfaces\DataModel\Entities\EntityInterface
{
	/** @Id @Column(type="integer") @GeneratedValue **/
	protected $id;
	
	/**
	 * @see \DecoupledApp\Interfaces\DataModel\Entities\EntityInterface::getId()
	 */
	public function getId() {
		return $this->getId();
	}
	
}