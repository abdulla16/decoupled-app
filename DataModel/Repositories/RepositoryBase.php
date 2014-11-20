<?php

namespace DecoupledApp\DataModel\Repositories;

/**
 * 
 * @author Abdulla Al-Qawasmeh
 * @link http://software-architecture-php.blogspot.com/2014/11/a-decoupled-application-in-php-putting.html
 *
 */
abstract class RepositoryBase extends \Doctrine\ORM\EntityRepository implements \DecoupledApp\Interfaces\DataModel\Repositories\RepositoryBaseInterface
{
	/**
	 * @see \DecoupledApp\Interfaces\DataModel\Repositories\RepositoryBaseInterface::add()
	 */
	public function add($entity) {
		$this->getEntityManager()->persist($entity);
	}
	
	/**
	 * @see \DecoupledApp\Interfaces\DataModel\Repositories\RepositoryBaseInterface::delete()
	 */
	public function delete($entity) {
		$this->getEntityManager()->remove($entity);
	
	}
	
	/**
	 * 
	 * @see \DecoupledApp\Interfaces\DataModel\Repositories\RepositoryBaseInterface::getById()
	 */
	public function getById($id) {
		return $this->find($id);
	}
	
}