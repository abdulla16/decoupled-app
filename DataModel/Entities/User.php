<?php

namespace DecoupledApp\DataModel\Entities;

/**
 * @author Abdulla Al-Qawasmeh
 * @link http://software-architecture-php.blogspot.com/2014/11/a-decoupled-application-in-php-putting.html
 * @Entity(repositoryClass="\DecoupledApp\DataModel\Repositories\UserRepository")
 * @Table(name="users")
 **/
class User extends EntityBase implements \DecoupledApp\Interfaces\DataModel\Entities\UserInterface
{
	
	/** @Column(type="string", name="first_name") **/
	protected $firstName;
	
	/** @Column(type="string", name="last_name") **/
	protected $lastName;
	
	/** @Column(type="string", name="user_name") **/
	protected $userName;

	/**
	 * @see \DecoupledApp\Interfaces\DataModel\Entities\UserInterface::getFirstName()
	 */
	public function getFirstName()
	{
		return $this->firstName;
	}

	/**
	 * @see \DecoupledApp\Interfaces\DataModel\Entities\UserInterface::setFirstName()
	 */
	public function setFirstName($firstName)
	{
		$this->firstName = $firstName;
	}
	
	/**
	 * @see \DecoupledApp\Interfaces\DataModel\Entities\UserInterface::getLastName()
	 */
	public function getLastName() 
	{
		return $this->lastName;
	}
	
	/**
	 * @see \DecoupledApp\Interfaces\DataModel\Entities\UserInterface::setLastName()
	 */
	public function setLastName($lastName) 
	{
		$this->lastName = $lastName;
	}
	
	/**
	 * @see \DecoupledApp\Interfaces\DataModel\Entities\UserInterface::getUserName()
	 */
	public function getUserName() 
	{
		return $this->userName;
	}
	
	/**
	 * @see \DecoupledApp\Interfaces\DataModel\Entities\UserInterface::setUserName()
	 */
	public function setUserName($userName) 
	{
		return $this->userName = $userName;
	}
	
	
	/**
	 * @see \JsonSerializable::jsonSerialize()
	 */
	public function jsonSerialize() {
		return [
			'id' => $this->id,
			'firstName' => $this->firstName,
			'lastName' => $this->lastName,
			'userName' => $this->userName
		];

	}

}