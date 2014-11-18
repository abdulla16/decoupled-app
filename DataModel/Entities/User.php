<?php

namespace DecoupledApp\DataModel\Entities;

/**
 * @Entity(repositoryClass="\DecoupledApp\DataModel\Repositories\UserRepository")
 * @Table(name="users")
 **/
class User implements \DecoupledApp\Interfaces\DataModel\Entities\UserInterface
{
	/** @Id @Column(type="integer") @GeneratedValue **/
	protected $id;
	
	/** @Column(type="string", name="first_name") **/
	protected $firstName;
	
	/** @Column(type="string", name="last_name") **/
	protected $lastName;
	
	/** @Column(type="string", name="user_name") **/
	protected $userName;

	public function getId()
	{
		return $this->id;
	}

	public function getFirstName()
	{
		return $this->firstName;
	}

	public function setFirstName($firstName)
	{
		$this->firstName = $firstName;
	}
	
	public function getLastName() 
	{
		return $this->lastName;
	}
	
	public function setLastName($lastName) 
	{
		$this->lastName = $lastName;
	}
	
	public function getUserName() 
	{
		return $this->userName;
	}
	
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