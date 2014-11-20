<?php

namespace DecoupledApp\Interfaces;

/**
 * 
 * @author Abdulla Al-Qawasmeh
 * @link http://software-architecture-php.blogspot.com/2014/11/a-decoupled-application-in-php-putting.html
 *
 */
interface EntityManagerInterface
{
	/**
	 * Saves any pending changes to the database.
	 */
	function saveChanges();
}