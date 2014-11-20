<?php

namespace DecoupledApp\DataModel\Repositories;

/**
 * 
 * @author Abdulla Al-Qawasmeh
 * @link http://software-architecture-php.blogspot.com/2014/11/a-decoupled-application-in-php-putting.html
 *
 */
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