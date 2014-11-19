<?php

namespace DecoupledApp\Interfaces\Helpers;

/**
* Automatically map JSON structures into objects.
*/
interface JsonMapperInterface 
{
	/**
	 * Map data all data in $json into the given $object instance.
	 *
	 * @param object $json   JSON object structure from json_decode()
	 * @param object $object Object to map $json data into
	 *
	 * @return object Mapped object is returned.
	 * @see    mapArray()
	 */
	function map($json, $object);
	
	/**
	 * Map an array
	 *
	 * @param array  $json  JSON array structure from json_decode()
	 * @param mixed  $array Array or ArrayObject that gets filled with
	 *                      data from $json
	 * @param string $class Class name for children objects.
	 *                      All children will get mapped onto this type.
	 *                      Supports class names and simple types
	 *                      like "string".
	 *
	 * @return mixed Mapped $array is returned
	 */
	public function mapArray($json, $array, $class = null);
}