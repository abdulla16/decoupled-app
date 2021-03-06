<?php

namespace DecoupledApp\Interfaces\DataModel\Entities;

/**
 * 
 * @author Abdulla Al-Qawasmeh
 * @link http://software-architecture-php.blogspot.com/2014/11/a-decoupled-application-in-php-putting.html
 *
 */
interface UserInterface extends EntityInterface
{
	/**
	 * @return string The first name of the user.
	 */
	function getFirstName();
	
	/**
	 * Sets the first name of the user.
	 * @param string $firstName
	 */
	function setFirstName($firstName);
	
	/**
	 * @return string The last name of the user.
	 */
	function getLastName();
	
	/**
	 * Sets the last name of the user.
	 * @param string $lastName
	 */
	function setLastName($lastName);
	
	/**
	 * @return string The user name of the user.
	 */
	function getUserName();
	
	/**
	 * Sets the username of the user.
	 * @param string $userName
	 */
	function setUserName($userName);
}