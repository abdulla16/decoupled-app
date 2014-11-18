<?php

namespace DecoupledApp\Interfaces;

interface EntityManagerInterface
{
	/**
	 * Saves any pending changes to the database.
	 */
	function saveChanges();
}