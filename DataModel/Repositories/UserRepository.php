<?php

namespace DecoupledApp\DataModel\Repositories;

class UserRepository extends RepositoryBase implements \DecoupledApp\Interfaces\DataModel\Repositories\UserRepositoryInterface {
	public function getAllUsers() {
		$dql = "SELECT u FROM \DecoupledApp\DataModel\Entities\User u ORDER BY u.firstName";
		$query = $this->getEntityManager()->createQuery ( $dql );
		return $query->getResult ();
	}
	
	
	/**
	 * @see \DecoupledApp\DataModel\Repositories\RepositoryBase::getById()
	 */
	public function getById($id) {
		return $this->find($id);
	}

}