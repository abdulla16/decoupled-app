<?php 

namespace DecoupledApp\Services\Post\UpdateUser;

class UpdateUser extends \DecoupledApp\Services\Put\AddUser
{
	/**
	 * @see \DecoupledApp\Interfaces\Services\ServiceInterface::processRequest()
	 */
	public function processRequest($requestObject, \DecoupledApp\Interfaces\Services\ServiceResultInterface &$serviceResult) {
		if($serviceResult->isSuccess()) {
			$user = $this->unitOfWork->getUserRepository()->getById($requestObject->getId());
			if($user == null) {
				$serviceResult->addError("User not found");
			} else {
				$user->setFirstName($requestObject->getFirstName());
				$user->setLastName($requestObject->getLastName());
				$user->setUserName($requestObject->getUserName());
				$this->unitOfWork->saveChanges();
				$serviceResult->setData("{'statusMessage' : 'The user was updated successfully'}");
			}
			
			
		}
	}

	/**
	 * @see \DecoupledApp\Interfaces\Services\ServiceInterface::validate()
	 */
	public function validate($requestObject, \DecoupledApp\Interfaces\Services\ServiceResultInterface &$serviceResult) {
		if(strlen($requestObject->getId()) == 0){
			$serviceResult->addInputError("id", "id is required");
		}
		
		parent::validate($requestObject, $serviceResult);
		
	
	}


}