<?php 
require_once __DIR__."/../../autoload.php";

$service = extractServiceName($_SERVER['REQUEST_URI']);

if(isset($_REQUEST['data'])) {
	$data = $_REQUEST['data'];
} else {
	$putData = fopen("php://input", "r");
	$data = "";
	while($additionalData = fread($putData, 1024))
		$data .= $additionalData;
	fclose($putData);
} 
if(empty($data)) {
	$data = "{}";
}
$broker = $container->resolve("\\DecoupledApp\\Interfaces\\Broker\\BrokerInterface");

$result = $broker->callService($_SERVER['REQUEST_METHOD'], $service, $data, $container);
header("Content-Type: application/json");
echo $result;

/**
 * 
 * @param string $requestUri
 * @return bool|string
 */
function extractServiceName($requestUri) 
{
	if(strlen($requestUri) <= 5) // the request URI must contain "/api/" at least
	{
		return false;
	}
	
	$requestUri = substr($requestUri, 5); // remove "/api/"
	
	$pos = strpos($requestUri, "?");
	if($pos === false) {
		$pos = strpos($requestUri, "/");
	}
	if($pos === false) {
		// A service may not need any data. Therefore, we may not have ? nor / in the URI
		return $requestUri;
	}
	$serviceName = substr($requestUri, 0, $pos);
	return $serviceName;
	
}