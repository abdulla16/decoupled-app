<?php

namespace DecoupledApp\Interfaces\DataModel\Entities;

interface UserInterface extends EntityInterface
{
	/**
	 * @return int The ID of the user.
	 */
	public function getId();
	
	/**
	 * @return string The first name of the user.
	 */
	public function getFirstName();
	
	/**
	 * Sets the first name of the user.
	 * @param string $firstName
	 */
	public function setFirstName($firstName);
	
	/**
	 * @return string The last name of the user.
	 */
	public function getLastName();
	
	/**
	 * Sets the last name of the user.
	 * @param string $lastName
	 */
	public function setLastName($lastName);
	
	/**
	 * @return string The user name of the user.
	 */
	public function getUserName();
	
	/**
	 * Sets the username of the user.
	 * @param string $userName
	 */
	public function setUserName($userName);
}