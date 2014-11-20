<?php 

namespace DecoupledApp\Interfaces\Broker;

/**
 * 
 * @author Abdulla Al-Qawasmeh
 * @link http://software-architecture-php.blogspot.com/2014/11/a-decoupled-application-in-php-putting.html
 *
 */
interface BrokerInterface
{
	/**
	 * 
	 * @param string $requestType GET, POST, PUT, or DELETE
	 * @param string $command
	 * @param string $jsonData
	 * @return string Returns the result of the call as a JSON string
	 */
	function callService($requestType, $command, $jsonData);
	
	/**
	 * 
	 * @param string $namespace
	 */
	function setServicesNamespace($namespace);
	
	/**
	 * 
	 * @param \DecoupledApp\Interfaces\Helpers\JsonMapperInterface $jsonMapper
	 */
	function setJsonMapper(\DecoupledApp\Interfaces\Helpers\JsonMapperInterface $jsonMapper);
	
	/**
	 * 
	 * @param \DecoupleApp\Interfaces\Container\ContainerInterface $container
	 */
	function setContainer(\DecoupledApp\Interfaces\Container\ContainerInterface $container);
}