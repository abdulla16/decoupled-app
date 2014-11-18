<?php 

namespace DecoupledApp\Services\Get\GetAllUsers;

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