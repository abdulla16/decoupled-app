<?php 

namespace DecoupledApp\Services\Post\UpdateUser;

/**
 * @author Abdulla Al-Qawasmeh
 * @link http://software-architecture-php.blogspot.com/2014/11/a-decoupled-application-in-php-putting.html
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