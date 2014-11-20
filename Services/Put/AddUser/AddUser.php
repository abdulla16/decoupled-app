<?php 

namespace DecoupledApp\Services\Put\AddUser;

/**
 * 
 * @author Abdulla Al-Qawasmeh
 * @link http://software-architecture-php.blogspot.com/2014/11/a-decoupled-application-in-php-putting.html
 *
 */
class AddUser extends \DecoupledApp\Services\ServiceBase
{
	/**
	 * @see \DecoupledApp\Interfaces\Services\ServiceInterface::processRequest()
	 */
	public function processRequest($requestObject, \DecoupledApp\Interfaces\Services\ServiceResultInterface &$serviceResult) {
		if($serviceResult->isSuccess()) {
			$newUser = $this->unitOfWork->getUserRepository()->getNew();
			
			$newUser->setFirstName($requestObject->getFirstName());
			$newUser->setLastName($requestObject->getLastName());
			$newUser->setUserName($requestObject->getUserName());
			
			$this->unitOfWork->getUserRepository()->add($newUser);
			$this->unitOfWork->saveChanges();
			$serviceResult->setData("{'id': '".$newUser->getId()."', statusMessage' : 'The user was added successfully'}");
			$this->logger->info("User Added");
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