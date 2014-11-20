<?php 

namespace DecoupledApp\Interfaces\Services;

/**
 * 
 * @author Abdulla Al-Qawasmeh
 * @link http://software-architecture-php.blogspot.com/2014/11/a-decoupled-application-in-php-putting.html
 *
 */
interface ServiceInterface
{
	/**
	 * 
	 * @param mixed $requestObject
	 * @param ServiceResultInterface &$serviceResult 
	 * We need to pass in the service result object that is returned from the validate method
	 * so that errors can be added to the same object. 
	 * @return ServiceResultInterface
	 */
	function processRequest($requestObject, ServiceResultInterface &$serviceResult);
	
	/**
	 * 
	 * @param mixed $requestObject
	 * @param ServiceResultInterface &$serviceResult 
	 */
	function validate($requestObject, ServiceResultInterface &$serviceResult);
	
	/**
	 * 
	 * @param \DecoupledApp\Interfaces\UnitOfWork\UnitOfWorkInterface $unitOfWork
	 */
	function setUnitOfWork(\DecoupledApp\Interfaces\UnitOfWork\UnitOfWorkInterface $unitOfWork);
}