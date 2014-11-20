<?php 

namespace DecoupledApp\Services\Get\GetAllUsers;

/**
 * 
 * @author Abdulla Al-Qawasmeh
 * @link http://software-architecture-php.blogspot.com/2014/11/a-decoupled-application-in-php-putting.html
 *
 */
class GetAllUsers extends \DecoupledApp\Services\ServiceBase
{
	/**
	 * @see \DecoupledApp\Interfaces\Services\ServiceInterface::processRequest()
	 */
	public function processRequest($requestObject, \DecoupledApp\Interfaces\Services\ServiceResultInterface &$serviceResult) {
		$data = $this->unitOfWork->getUserRepository()->getAllUsers();
		$serviceResult->setData($data);
	}

	/**
	 * @see \DecoupledApp\Interfaces\Services\ServiceInterface::validate()
	 */
	public function validate($requestObject, \DecoupledApp\Interfaces\Services\ServiceResultInterface &$serviceResult) {

	}


}