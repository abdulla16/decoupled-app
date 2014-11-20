<?php
namespace DecoupledApp\Interfaces\DataModel\Repositories;

/**
 * 
 * @author Abdulla Al-Qawasmeh
 * @link http://software-architecture-php.blogspot.com/2014/11/a-decoupled-application-in-php-putting.html
 *
 */
interface UserRepositoryInterface extends RepositoryBaseInterface
{
	/**
	 * @return Array Returns all users as an Array of UserInterface.
	 */
	public function getAllUsers();
}