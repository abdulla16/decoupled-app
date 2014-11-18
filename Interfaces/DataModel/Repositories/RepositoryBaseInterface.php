<?php

namespace DecoupledApp\Interfaces\DataModel\Repositories;

interface RepositoryBaseInterface
{
	/**
	 *
	 * @param mixed $entity The entity to add.
	 */
	function add($entity);
	
	/**
	 *
	 * @param mixed $entity The entity to delete.
	*/
	function delete($entity);
	
	/**
	 * 
	 * @param integer $id The id of the entity to retrieve.
	 * @return mixed The entity that matches the $id.
	 */
	function getById($id);
	
}