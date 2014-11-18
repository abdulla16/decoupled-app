<?php 

namespace DecoupledApp\Interfaces\Services;

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
	 * @param \DecoupledApp\Interfaces\ContainerInterface $container
	 */
	function __construct(\DecoupledApp\Interfaces\ContainerInterface $container);
}