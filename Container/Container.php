<?php 

namespace DecoupledApp\Container;

/**
 * A concrete implementation of the \DecoupledApp\ContainerInterface. 
 * All of the project object dependencies are registered after this object is instantiated
 * @author Abdulla
 *
 */
class Container implements \DecoupledApp\Interfaces\ContainerInterface 
{
	/**
	 * 
	 * @param string $interfaceName
	 * @return object|NULL If the $interfaceName is registered, the this function creates the corresponding object and returns it;
	 * otherwise, this function returns null
	 */
	public function resolve($interfaceName) 
	{
		$interfaceName = trim($interfaceName, "\\");
		$obj = null;
		if(isset($this->singletonRegistry[$interfaceName])) 
		{
			//TODO: check if the class exists
			$className = $this->singletonRegistry[$interfaceName];
			$obj = $className::getInstance();
		} 
		else if(isset($this->closureRegistry[$interfaceName]))
		{
			$obj = $this->closureRegistry[$interfaceName]();
		}
		else if(isset($this->typeRegistry[$interfaceName])) 
		{
			//TODO: check if the class exists
			$reflectionClass = new \ReflectionClass($this->typeRegistry[$interfaceName]);
			$constructor = $reflectionClass->getConstructor();
			$args = null;
			if($constructor !== null)
			{
				$block = new \phpDocumentor\Reflection\DocBlock($constructor);
			
				$tags = $block->getTagsByName("param");
				if(count($tags) > 0)
				{
					$args = array();
				}
				foreach($tags as $tag)
				{
					//resolve constructor parameters
					$args[] = $this->resolve($tag->getType());
				}
			}
			if($args !== null)
			{
				$obj = $reflectionClass->newInstanceArgs($args);
			}
			else
			{
				$obj = $reflectionClass->newInstanceArgs();
			}
		}
		
		if($obj !== null) 
		{
			//Now we need to resolve the object properties
			$reflectionClass = new \ReflectionClass(get_class($obj));
			$props = $reflectionClass->getProperties();
			foreach($props as $prop)
			{
				$block = new \phpDocumentor\Reflection\DocBlock($prop);
				//This assumes that there is only one "var" tag.
				//If there are more than one, then only the first one will be considered.
				$tags = $block->getTagsByName("var");
				if(isset($tags[0]))
				{
					$value = $this->resolve($tags[0]->getType());
					if($value !== null) 
					{
						if($prop->isPublic()) {
							$prop->setValue($obj, $value);
						} else {
							$setter = "set".ucfirst($prop->name);
							if($reflectionClass->hasMethod($setter)) {
								$rmeth = $reflectionClass->getMethod($setter);
								if($rmeth->isPublic()){
									$rmeth->invoke($obj, $value);
								}
							}
						}
					}
				}
			}
		}
		return $obj;
	}
	
	/**
	 *
	 * @param Array $singletonRegistry
	 * @param Array $typeRegistry
	 */
	public function __construct($singletonRegistry, $typeRegistry, $closureRegistry) 
	{
		$this->singletonRegistry = $singletonRegistry;
		$this->typeRegistry = $typeRegistry;
		$this->closureRegistry = $closureRegistry;
	}

	
	/**
	 * An array that stores the mappings of an interface to a concrete class. The key/value pair corresond to the interface name/class name pair.
	 * The interface and class names are all fully qualified (i.e., include the namespaces).
	 * @var Array
	 */
	private $singletonRegistry;
	
	/**
	 * An array that stores the mappings of an interface to a concrete class. The key/value pair corresond to the interface name/class name pair.
	 * * The interface and class names are all fully qualified (i.e., include the namespaces).
	 * @var Array
	 */
	private $typeRegistry;
	
	/**
	 * An array that stores the mappings of an interface to a closure that is used to create and return the concrete object.
	 * The key/value pair corresond to the interface name/class name pair.
	 * * The interface and class names are all fully qualified (i.e., include the namespaces).
	 * @var Array
	 */
	private $closureRegistry;
	
}