<?php

namespace DecoupledApp\Interfaces\Providers;

/**
 * Any class that needs to utilize the LoggerInterface must implement this interface.
 * @author Abdulla Al-Qawasmeh
 *
 */
interface LoggerClientInterface
{
	/**
	 * 
	 * @param \DecoupledApp\Interfaces\Providers\LoggerInterface $logger
	 */
	function setLogger(\DecoupledApp\Interfaces\Providers\LoggerInterface $logger);
}
