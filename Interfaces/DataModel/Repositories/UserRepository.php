<?php
namespace DecoupledApp\Interfaces\DataModel\Repositories;


interface UserRepositoryInterface 
{
	/**
	 * @return Array Returns all users as an Array of UserInterface.
	 */
	public function getAllUsers();
}