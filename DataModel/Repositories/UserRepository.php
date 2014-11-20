<?php

namespace DecoupledApp\DataModel\Repositories;

class UserRepository extends RepositoryBase implements \DecoupledApp\Interfaces\DataModel\Repositories\UserRepositoryInterface {
	public function getAllUsers() {
		$dql = "SELECT u FROM \DecoupledApp\DataModel\Entities\User u ORDER BY u.firstName";
		$query = $this->getEntityManager()->createQuery ( $dql );
		return $query->getResult ();
	}
	
	/**
	 * @see \DecoupledApp\Interfaces\DataModel\Repositories\RepositoryBaseInterface::getNew()
	 */
	public function getNew() {
		return new \DecoupledApp\DataModel\Entities\User();
	}

}