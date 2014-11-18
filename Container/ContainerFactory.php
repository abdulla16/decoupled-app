<?php 

$singletonRegistry = array();
$singletonRegistry["DecoupledApp\\Interfaces\\UnitOfWork\\UnitOfWorkInterface"] =
	"\\DecoupledApp\\UnitOfWork\\UnitOfWork";

$singletonRegistry["DecoupledApp\\Interfaces\\Broker\\BrokerInterface"] =
	"\\DecoupledApp\\Broker\\Broker";

$singletonRegistry["DecoupledApp\\Interfaces\\Providers\\LoggingInterface"] =
"\\DecoupledApp\\Providers\\LoggingProvider";


$typeRegistry = array();
$typeRegistry["DecoupledApp\\Interfaces\\DataModel\\Entities\\UserInterface"] = 
	"\\DecoupledApp\\DataModel\\Entities\\User";

$typeRegistry["DecoupledApp\\Interfaces\\Services\\ServiceResultInterface"] = 
	"\\DecoupledApp\\Services\\ServiceResult";


$closureRegistry = array();
$closureRegistry["DecoupledApp\\Interfaces\\DataModel\\Repositories\\UserRepositoryInterface"] = 
	function() {
		global $entityManager;
		return $entityManager->getRepository("\\DecoupledApp\\DataModel\\Entities\\User");
	};
	
$closureRegistry["DecoupledApp\\Interfaces\\ContainerInterface"] =
	function() {
		global $container;
		return $container;
	};
	
$closureRegistry["DecoupledApp\\Interfaces\\EntityManagerInterface"] =
	function() {
		global $entityManager;
		\DecoupledApp\DataModel\EntityManager::getInstance()->setDoctrineEntityManager($entityManager);
		return \DecoupledApp\DataModel\EntityManager::getInstance();
	};


$container = new \DecoupledApp\Container\Container($singletonRegistry, $typeRegistry, $closureRegistry);