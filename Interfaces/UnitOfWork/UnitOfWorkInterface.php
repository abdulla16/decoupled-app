<?php 

namespace DecoupledApp\Interfaces\UnitOfWork;

interface UnitOfWorkInterface
{
	/**
	 * @return \DecoupledApp\Interfaces\Repositories\UserRepositoryInterface
	 */
	function getUserRepository();
	
	/**
	 * Calls \DecoupledApp\Interfaces\EntityManagerInterface::saveChanges() to save any pending changes to the database in one transaction.
	 */
	function saveChanges();
	
	/**
	 * 
	 * @param \DecoupledApp\Interfaces\ContainerInterface $container
	 */
	function setContainer(\DecoupledApp\Interfaces\ContainerInterface $container);
}