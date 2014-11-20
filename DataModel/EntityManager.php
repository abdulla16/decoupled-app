<?php

namespace DecoupledApp\DataModel;

/**
 * 
 * @author Abdulla Al-Qawasmeh
 * @link http://software-architecture-php.blogspot.com/2014/11/a-decoupled-application-in-php-putting.html
 *
 */
class EntityManager implements \DecoupledApp\Interfaces\EntityManagerInterface
{
	/**
	 * 
	 * @var EntityManager
	 */
	private static $instance;
	
	private function __construct(){;}
	
	/**
	 * 
	 * @return \DecoupledApp\DataModel\EntityManager
	 */
	public static function getInstance()
	{
		if(!isset(EntityManager::$instance)) {
			EntityManager::$instance = new EntityManager();
		}
		return EntityManager::$instance;
	}
	
	/**
	 * 
	 * @var \Doctrine\ORM\EntityManager
	 */
	private $DoctrineEntityManager;
	
	/**
	 * 
	 * @param \Doctrine\ORM\EntityManager $manager
	 */
	public function setDoctrineEntityManager(\Doctrine\ORM\EntityManager $manager)
	{
		$this->DoctrineEntityManager = $manager;
	}
	
	/**
	 * 
	 * @see \DecoupledApp\Interfaces\EntityManagerInterface::saveChanges()
	 */
	public function saveChanges()
	{
		$this->DoctrineEntityManager->flush();
	}
}