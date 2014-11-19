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
	 * @see \DecoupledApp\Interfaces\Services\ServiceInterface::setUnitOfWork()
	 */
	public function setUnitOfWork(\DecoupledApp\Interfaces\UnitOfWork\UnitOfWorkInterface $unitOfWork)
	{
		$this->unitOfWork = $unitOfWork;
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