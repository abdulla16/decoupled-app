<?php 

namespace DecoupledApp\Services\Delete\DeleteUser;

/**
 * @author Abdulla Al-Qawasmeh
 *
 */
class DeleteUserRequest
{
	/**
	 * 
	 * @var int
	 */
	private $id;
	
	/**
	 * 
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}
	
	/**
	 * 
	 * @param int $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}
	
}