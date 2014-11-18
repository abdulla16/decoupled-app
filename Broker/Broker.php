<?php 

namespace DecoupledApp\Broker;

class Broker implements \DecoupledApp\Interfaces\Broker\BrokerInterface
{
	const SERVICES_NAMESPACE = "\\DecoupledApp\\Services";
	
	private function __construct() {;}
	
	private static $instance;
	
	public static function getInstance() 
	{
		if(!isset(self::$instance)) {
			self::$instance = new Broker();
		}
		return self::$instance;
	}
	
	/**
	 * 
	 * @see \DecoupledApp\Interfaces\Broker\BrokerInterface::callService()
	 */
	public function callService($requestType, $command, $jsonData, \DecoupledApp\Interfaces\ContainerInterface $container) {
		
		$requestType = ucfirst(strtolower($requestType));
		$className = self::SERVICES_NAMESPACE."\\$requestType\\".ucfirst($command)."\\".ucfirst($command);
		$classNameRequest = self::SERVICES_NAMESPACE."\\$requestType\\".ucfirst($command)."\\".ucfirst($command)."Request";
		$result = $container->resolve("\\DecoupledApp\\Interfaces\\Services\\ServiceResultInterface");
		if(!class_exists($className) || !class_exists($classNameRequest)) {
			//TODO: add a more detailed error message
			$result->addError("Unknown command");
		} else {
			/**
			 * @var \DecoupledApp\Interfaces\Services\ServiceInterface
			 */
			$service = new $className($container);
			$jsonMapper = new \DecoupledApp\Helpers\JsonMapper();
			$dataObject = new $classNameRequest();
			
			$jsonObject = json_decode($jsonData);
			
			if($jsonObject == FALSE) {
				
				$result->addError("Unable to deserialize request");
			} else {
				$dataObject = $jsonMapper->map($jsonObject, $dataObject);
				$service->validate($dataObject, $result);
				$service->processRequest($dataObject, $result);
			}
		}
		return $result->serialize();

	}

}