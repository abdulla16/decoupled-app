<?php 

namespace DecoupledApp\Services\Post\UpdateUser;

/**
 * @author Abdulla Al-Qawasmeh
 *
 */
class UpdateUserRequest extends \DecoupledApp\Services\Put\AddUser\AddUserRequest
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