<?php 

namespace DecoupledApp\Services;

/**
 * 
 * @author Abdulla Al-Qawasmeh
 * @link http://software-architecture-php.blogspot.com/2014/11/a-decoupled-application-in-php-putting.html
 *
 */
abstract class ServiceBase implements 
	\DecoupledApp\Interfaces\Services\ServiceInterface,
	\DecoupledApp\Interfaces\Providers\LoggerClientInterface
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
	
	/**
	 * 
	 * @var \DecoupledApp\Interfaces\Providers\LoggerInterface
	 */
	protected $logger;
	
	/**
	 * 
	 * @see \DecoupledApp\Interfaces\Providers\LoggerClientInterface::setLogger()
	 */
	public function setLogger(\DecoupledApp\Interfaces\Providers\LoggerInterface $logger) {
		$this->logger = $logger;
	}
}