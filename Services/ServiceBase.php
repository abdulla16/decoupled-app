<?php 

namespace DecoupledApp\Services;

abstract class ServiceBase implements \DecoupledApp\Interfaces\Services\ServiceInterface
{
	/**
	 *
	 * @var \DecoupledApp\Interfaces\UnitOfWork\UnitOfWorkInterface
	 */
	protected $unitOfWork;
	
	/**
	 * 
	 * @var \DecoupledApp\Interfaces\ContainerInterface
	 */
	protected $container;
	
	/**
	 * 
	 * @see \DecoupledApp\Interfaces\Services\ServiceInterface::__construct()
	 */
	public function __construct(\DecoupledApp\Interfaces\ContainerInterface $container) {
		$this->container = $container;
		$this->unitOfWork = $this->container->resolve("\\DecoupledApp\\Interfaces\\UnitOfWork\\UnitOfWorkInterface");
	}
	
	/**
	 * @see \DecoupledApp\Interfaces\Services\ServiceInterface::processRequest()
	 */
	public abstract function processRequest($requestObject, \DecoupledApp\Interfaces\Services\ServiceResultInterface &$serviceResult);

	/**
	 * @see \DecoupledApp\Interfaces\Services\ServiceInterface::validate()
	 */
	public abstract function validate($requestObject, \DecoupledApp\Interfaces\Services\ServiceResultInterface &$serviceResult);
	
}