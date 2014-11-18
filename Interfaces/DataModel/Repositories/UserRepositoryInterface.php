<?php
namespace DecoupledApp\Interfaces\DataModel\Repositories;


interface UserRepositoryInterface extends RepositoryBaseInterface
{
	/**
	 * @return Array Returns all users as an Array of UserInterface.
	 */
	public function getAllUsers();
}