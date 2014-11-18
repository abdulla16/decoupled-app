<?php 

namespace DecoupledApp\Services\Put\AddUser;

class AddUser extends \DecoupledApp\Services\ServiceBase
{
	/**
	 * @see \DecoupledApp\Interfaces\Services\ServiceInterface::processRequest()
	 */
	public function processRequest($requestObject, \DecoupledApp\Interfaces\Services\ServiceResultInterface &$serviceResult) {
		if($serviceResult->isSuccess()) {
			$newUser = $this->container->resolve("\\DecoupledApp\\Interfaces\\DataModel\\Entities\\UserInterface");
			
			$newUser->setFirstName($requestObject->getFirstName());
			$newUser->setLastName($requestObject->getLastName());
			$newUser->setUserName($requestObject->getUserName());
			
			$this->unitOfWork->getUserRepository()->add($newUser);
			$this->unitOfWork->saveChanges();
			$serviceResult->setData("{'id': '".$newUser->getId()."', statusMessage' : 'The user was added successfully'}");
		}
	}

	/**
	 * @see \DecoupledApp\Interfaces\Services\ServiceInterface::validate()
	 */
	public function validate($requestObject, \DecoupledApp\Interfaces\Services\ServiceResultInterface &$serviceResult) {
		if(strlen($requestObject->getFirstName()) == 0){
			$serviceResult->addInputError("firstName", "firstName is required");
		}
		
		if(strlen($requestObject->getLastName()) == 0){
			$serviceResult->addInputError("lastName", "lastName is required");
		}
		
		if(strlen($requestObject->getUserName()) == 0){
			$serviceResult->addInputError("userName", "userName is required");
		}
	
	}


}