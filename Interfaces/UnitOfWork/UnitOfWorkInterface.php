<?php 

namespace DecoupledApp\Interfaces\UnitOfWork;

/**
 * 
 * @author Abdulla Al-Qawasmeh
 * @link http://software-architecture-php.blogspot.com/2014/11/a-decoupled-application-in-php-putting.html
 *
 */
interface UnitOfWorkInterface
{
	
	/**
	 * Calls \DecoupledApp\Interfaces\EntityManagerInterface::saveChanges() to save any pending changes to the database in one transaction.
	 */
	function saveChanges();
	
	/**
	 * 
	 * @param \DecoupledApp\Interfaces\EntityManagerInterface $entityManager
	 */
	function setEntityManager(\DecoupledApp\Interfaces\EntityManagerInterface $entityManager);
	
	/**
	 * 
	 * @param \DecoupledApp\Interfaces\DataModel\Repositories\UserRepositoryInterfacce $userRepository
	 */
	function setUserRepository(\DecoupledApp\Interfaces\DataModel\Repositories\UserRepositoryInterface $userRepository);
	
	/**
	 * @return \DecoupledApp\Interfaces\DataModel\Repositories\UserRepositoryInterface
	 */
	function getUserRepository();
}