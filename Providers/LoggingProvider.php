<?php 

namespace DecoupledApp\Providers;
/**
 * This class has two main purposes. First, it ensures we only have one instance of the logger at any time.
 * Second, it provides the configuration for \Monolog\Logger.
 * @author Abdulla Al-Qawasmeh
 *
 */
class LoggingProvider extends \Monolog\Logger
{
	/**
	 * 
	 * @var LoggingProvider
	 */
	private static $instance;
	
	//Would have liked the constructor to be private, but it's giving an error because 
	//the constructor in \Monolog\Logger is pubilc
	public function __construct($name)
	{
		if(isset(self::$instance)) {
			throw new \Exception("Call getInstance instead");
		}
		parent::__construct($name);
	}
	
	public static function getInstance() 
	{
		if(!isset(self::$instance)) {
			self::$instance = new LoggingProvider("Default");
			$handler = new \Monolog\Handler\StreamHandler(__DIR__."/../logs/log");
			self::$instance->pushHandler($handler);
		}
		return self::$instance;
	}
}