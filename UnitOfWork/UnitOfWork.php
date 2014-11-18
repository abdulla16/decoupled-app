<?php
namespace DecoupledApp\UnitOfWork;


/**
 * This is a singleton class
 * @author Abdulla Al-Qawasmeh
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
	 * This needs to be public so that the Container::resolve function can set the value of this property.
	 * @var \DecoupledApp\Interfaces\ContainerInterface
	 */
	private $container;
	
	public function setContainer(\DecoupledApp\Interfaces\ContainerInterface $container)
	{
		$this->container = $container;
	}
	
	public function getUserRepository() 
	{
		return $this->container->resolve("\\DecoupledApp\\Interfaces\\DataModel\\Repositories\\UserRepositoryInterface");
	}
	
	/**
	 * @see \DecoupledApp\Interfaces\UnitOfWork\UnitOfWorkInterface::saveChanges()
	 */
	public function saveChanges() 
	{
		$this->container->resolve("\\DecoupledApp\\Interfaces\\EntityManagerInterface")->saveChanges();
	}
}