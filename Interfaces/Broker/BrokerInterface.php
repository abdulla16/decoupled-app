<?php 

namespace DecoupledApp\Interfaces\Broker;

interface BrokerInterface
{
	/**
	 * 
	 * @param string $requestType GET, POST, PUT, or DELETE
	 * @param string $command
	 * @param string $jsonData
	 * @param \DecoupledApp\Interfaces\ContainerInterface $container
	 * @return string Returns the result of the call as a JSON string
	 */
	function callService($requestType, $command, $jsonData, \DecoupledApp\Interfaces\ContainerInterface $container);
}