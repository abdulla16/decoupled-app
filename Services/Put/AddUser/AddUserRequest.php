<?php 

namespace DecoupledApp\Services\Put\AddUser;

/**
 * @author Abdulla Al-Qawasmeh
 * @link http://software-architecture-php.blogspot.com/2014/11/a-decoupled-application-in-php-putting.html
 */
class AddUserRequest
{
	/**
	 * 
	 * @var string
	 */
	private $firstName;
	
	/**
	 * 
	 * @var string
	 */
	private $lastName;
	
	/**
	 * 
	 * @var string
	 */
	private $userName;
	
	/**
	 * @return string
	 */
	public function getFirstName() 
	{
		return $this->firstName;
	}
	
	/**
	 * 
	 * @param string $firstName
	 */
	public function setFirstName($firstName)
	{
		$this->firstName = $firstName;
	}
	
	/**
	 * @return string
	 */
	public function getLastName() 
	{
		return $this->lastName;
	}
	
	/**
	 * 
	 * @param string $lastName
	 */
	public function setLastName($lastName)
	{
		$this->lastName = $lastName;
	}
	
	/**
	 * @return string
	 */
	public function getUserName()
	{
		return $this->userName;
	}
	
	/**
	 * 
	 * @param string $userName
	 */
	public function setUserName($userName) 
	{
		$this->userName = $userName;
	}
}