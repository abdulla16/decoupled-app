<?php 

namespace DecoupledApp\Broker;

class Broker implements \DecoupledApp\Interfaces\Broker\BrokerInterface
{
	/**
	 * 
	 * @var string
	 */
	private $servicesNamespace;
	
	/**
	 * @see \DecoupledApp\Interfaces\Broker\BrokerInterface::setServicesNamespace()
	 */
	public function setServicesNamespace($namespace)
	{
		$this->servicesNamespace = $namespace;
	}
	
	/**
	 * 
	 * @var \DecoupledApp\Interfaces\Helpers\JsonMapperInterface
	 */
	private $jsonMapper;
	
	/**
	 * 
	 * @see \DecoupledApp\Interfaces\Broker\BrokerInterface::setJsonMapper()
	 */
	public function setJsonMapper(\DecoupledApp\Interfaces\Helpers\JsonMapperInterface $jsonMapper)
	{
		$this->jsonMapper = $jsonMapper;
	}
	
	/**
	 * 
	 * @var \DecoupledApp\Interfaces\Container\ContainerInterface
	 */
	private $container;
	
	/**
	 * @see \DecoupledApp\Interfaces\Broker\BrokerInterface::setContainer()
	 */
	public function setContainer(\DecoupledApp\Interfaces\Container\ContainerInterface $container) 
	{
		$this->container = $container;
	}
	
	private function __construct() {;}
	
	/**
	 * 
	 * @var Broker
	 */
	private static $instance;
	
	/**
	 * 
	 * @return \DecoupledApp\Interfaces\Broker\BrokerInterface
	 */
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
	public function callService($requestType, $command, $jsonData) {
		
		$requestType = ucfirst(strtolower($requestType));
		$className = $this->servicesNamespace."\\$requestType\\".ucfirst($command)."\\".ucfirst($command);
		$classNameRequest = $this->servicesNamespace."\\$requestType\\".ucfirst($command)."\\".ucfirst($command)."Request";
		
		//I could have injected the ServiceResult object into the Broker object (and you can do that if you prefer). 
		//However, I did not want the client of Broker to assume that it's the one setting the result when it's the responsibility of 
		//the service object.
		$result = $this->container->resolve("\\DecoupledApp\\Interfaces\\Services\\ServiceResultInterface");
		
		if(!class_exists($className) || !class_exists($classNameRequest)) {
			//TODO: add a more detailed error message
			$result->addError("Unknown command");
		} else {
			/**
			 * @var \DecoupledApp\Interfaces\Services\ServiceInterface
			 */
			$service = $this->container->make($className);
			$dataObject = new $classNameRequest();
			$jsonObject = json_decode($jsonData);
			
			if($jsonObject == FALSE) {
				
				$result->addError("Unable to deserialize request");
			} else {
				$dataObject = $this->jsonMapper->map($jsonObject, $dataObject);
				$service->validate($dataObject, $result);
				$service->processRequest($dataObject, $result);
			}
		}
		return $result->serialize();
	}
}