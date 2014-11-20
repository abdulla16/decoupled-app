<?php 

namespace DecoupledApp\Services\Post\UpdateUser;

/**
 * 
 * @author Abdulla Al-Qawasmeh
 * @link http://software-architecture-php.blogspot.com/2014/11/a-decoupled-application-in-php-putting.html
 *
 */
class UpdateUser extends \DecoupledApp\Services\Put\AddUser\AddUser
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
				$this->logger->info("User Updated");
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