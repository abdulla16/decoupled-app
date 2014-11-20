<?php
namespace DecoupledApp\UnitOfWork;


use DecoupledApp\DataModel\Repositories\UserRepository;

/**
 * @author Abdulla Al-Qawasmeh
 * @link http://software-architecture-php.blogspot.com/2014/11/a-decoupled-application-in-php-putting.html
 */
class UnitOfWork implements \DecoupledApp\Interfaces\UnitOfWork\UnitOfWorkInterface
{
	/**
	 * 
	 * @var \DecoupledApp\UnitOfWork\UnitOfWork
	 */
	private static $instance;
	
	private function __construct() { ;}
	
	/**
	 * 
	 * @return \DecoupledApp\UnitOfWork\UnitOfWork
	 */
	public static function getInstance()
	{
		if(!isset(UnitOfWork::$instance))
		{
			UnitOfWork::$instance = new UnitOfWork();
		}
		return UnitOfWork::$instance;
	}
	
	/**
	 * 
	 * @var \DecoupledApp\Interfaces\EntityManagerInterface
	 */
	private $entityManager;
	
	/**
	 * @see \DecoupledApp\Interfaces\UnitOfWork\UnitOfWorkInterface::setEntityManager()
	 */
	public function setEntityManager(\DecoupledApp\Interfaces\EntityManagerInterface $entityManager)
	{
		$this->entityManager = $entityManager;
	}
	
	/**
	 * 
	 * @var \DecoupledApp\Interfaces\DataModel\Repositories\UserRepositoryInterface
	 */
	private $userRepository;
	
	/**
	 * @see \DecoupledApp\Interfaces\UnitOfWork\UnitOfWorkInterface::setUserRepository()
	 */
	public function setUserRepository(\DecoupledApp\Interfaces\DataModel\Repositories\UserRepositoryInterface $userRepository)
	{
		$this->userRepository = $userRepository;
	}
	
	/**
	 * 
	 * @see \DecoupledApp\Interfaces\UnitOfWork\UnitOfWorkInterface::getUserRepository()
	 */
	public function getUserRepository() 
	{
		return $this->userRepository;
	}
	
	/**
	 * @see \DecoupledApp\Interfaces\UnitOfWork\UnitOfWorkInterface::saveChanges()
	 */
	public function saveChanges() 
	{
		$this->entityManager->saveChanges();
	}
}