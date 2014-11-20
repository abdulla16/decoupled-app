<?php 

namespace DecoupledApp\Services;

/**
 * 
 * @author Abdulla Al-Qawasmeh
 * @link http://software-architecture-php.blogspot.com/2014/11/a-decoupled-application-in-php-putting.html
 *
 */
class ServiceResult implements \DecoupledApp\Interfaces\Services\ServiceResultInterface, \JsonSerializable
{
	/**
	 * 
	 * @var array An array of strings.
	 */
	private $errors;
	
	/**
	 * @see \DecoupledApp\Interfaces\Services\ServiceResultInterface::addError()
	 */
	public function addError($errorString) 
	{
		if(!isset($this->errors)) {
			$this->errors = array();
		}
		$this->errors[] = $errorString;

	}
	
	/**
	 * 
	 * @var array An array of key/value. Keys represent the field names. 
	 * The values represent the error messages.
	 */
	private $inputErrors;
	
	/**
	 * @see \DecoupledApp\Interfaces\Services\ServiceResultInterface::addInputError()
	 */
	public function addInputError($field, $errorString) {
		if(!isset($this->inputErrors)) {
			$this->inputErrors = array();
		}
		
		$this->inputErrors[$field] = $errorString;

	}
	
	/**
	 * 
	 * @var mixed
	 */
	private $data;
	
	/**
	 * @see \DecoupledApp\Interfaces\Services\ServiceResultInterface::getData()
	 */
	public function getData() {
		return $this->data;

	}
	
	/**
	 * @see \DecoupledApp\Interfaces\Services\ServiceResultInterface::setData()
	 */
	public function setData($dataObject) {
		$this->data = $dataObject;

	}

	/**
	 * @see \DecoupledApp\Interfaces\Services\ServiceResultInterface::getErrors()
	 */
	public function getErrors() {
		return $this->errors;

	}

	
	/**
	 * @see \DecoupledApp\Interfaces\Services\ServiceResultInterface::getInputErrors()
	 */
	public function getInputErrors() {
		return $this->inputErrors;

	}

	
	/**
	 * @see \DecoupledApp\Interfaces\Services\ServiceResultInterface::isSuccess()
	 */
	public function isSuccess() {
		return (!isset($this->inputErrors) || count($this->inputErrors) == 0) && 
			(!isset($this->errors) || count($this->errors) == 0);

	}
	
	/**
	 * @see \DecoupledApp\Interfaces\Services\ServiceResultInterface::serialize()
	 */
	public function serialize() {
		return json_encode($this);

	}
	
	
	/** 
	 * @see JsonSerializable::jsonSerialize()
	 */
	public function jsonSerialize() {
		$arr = array();
		$arr["errors"] = array();
		if($this->getErrors()) {
			foreach($this->getErrors() as $error) {
				$arr["errors"][] = $error;
			}
		}
		$arr["inputErrors"] = array();
		if($this->getInputErrors()) {
			
			foreach($this->getInputErrors() as $key => $value) {
				$arr["inputErrors"][$key] = $value;
			}
		}
		
		$arr["isSuccess"] = $this->isSuccess();
		
		$arr["data"] = $this->data;
		return $arr;

	}


} 