<?php

namespace DecoupledApp\Interfaces;

/**
 * This interface is used whenever we need to resolve a specific interface into a concrete object.
 * @author Abdulla Al-Qawasmeh
 * 
 */
interface ContainerInterface 
{
	
	/**
	 * 
	 * @param string $interface_name This is the name of the interface that we want to resolve.
	 * @return mixed The concrete object that corresponds to the $interface_name.
	 */
	function resolve($interface_name);
	
}