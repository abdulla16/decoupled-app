<?php

namespace DecoupledApp\Interfaces\Services;

/**
 * 
 * @author Abdulla Al-Qawasmeh
 * @link http://software-architecture-php.blogspot.com/2014/11/a-decoupled-application-in-php-putting.html
 *
 */
interface ServiceResultInterface
{
	/**
	 * @return mixed The result of the service call.
	 */
	function getData();
	
	/**
	 * 
	 * @param mixed $dataObject The result of the service call.
	 */
	function setData($dataObject);
	
	/**
	 * @return bool Whether the service call succeeded or not.
	 */
	function isSuccess();
	
	/**
	 * @return array An array of strings representing the errors that occured.
	 */
	function getErrors();
	
	/**
	 * @return array An array of strings representing the field specific errors that occured.
	 * The keys of the array are the field names. The values are the error messages.
	 */
	function getInputErrors();
	
	/**
	 * 
	 * @param string $errorString
	 */
	function addError($errorString);
	
	/**
	 * 
	 * @param string $field
	 * @param string $errorString
	 */
	function addInputError($field, $errorString);
	
	/**
	 * If we want to support more formats, then we can change serialize() and pass in the format 
	 * (e.g., XML) as an argument.
	 * @return string JSON string
	 */
	function serialize();
}