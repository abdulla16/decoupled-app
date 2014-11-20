<?php 

namespace DecoupledApp\Services\Delete\DeleteUser;

class DeleteUser extends \DecoupledApp\Services\ServiceBase
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
				$this->unitOfWork->getUserRepository()->delete($user);
				$this->unitOfWork->saveChanges();
				$serviceResult->setData("{'statusMessage' : 'The user was deleted successfully'}");
				$this->logger->info("User Deleted");
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
	}


}