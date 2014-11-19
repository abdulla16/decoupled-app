<?php

namespace DecoupledApp\Interfaces\Container;

/**
 * This interface is used whenever we need to resolve a specific interface into a concrete object.
 * @author Abdulla Al-Qawasmeh
 * 
 */
interface ContainerInterface 
{
	
	/**
	 * @param string $dataType This is the data type (e.g., \DecoupledApp\Interfaces\Container\ContainerInterface) of the dependency to resolve.
	 * @return mixed The concrete object that inherits from $dataType.
	 */
	function resolve($dataType);
	
	/**
	 * This function is called on types that are NOT registered with the Dependency Container. 
	 * This allows the Dependency Container to resolve any registered dependencies (properties or constructor parameters) of the data type.
	 * @param string $dataType This is the data type of the object to make.
	 * @return mixed The concrete object (with all dependencies resolved).
	 */
	function make($dataType);
	
}