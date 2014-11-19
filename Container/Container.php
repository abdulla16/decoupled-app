<?php 

namespace DecoupledApp\Container;

/**
 * A concrete implementation of the \DecoupledApp\Interfaces\Container\ContainerInterface. 
 * @author Abdulla
 *
 */
class Container implements \DecoupledApp\Interfaces\Container\ContainerInterface 
{
	/**
	 * This function resolves the constructor arguments and creates an object
	 * @param string $dataType
	 * @return mixed An object
	 */
	private function createObject($dataType)
	{
		if(!class_exists($dataType)) {
			throw new \Exception("$dataType class does not exist");
		}
		$reflectionClass = new \ReflectionClass($dataType);
		$constructor = $reflectionClass->getConstructor();
		$args = null;
		$obj = null;
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
		
		return $obj;
	}
	
	/**
	 * Resolves the properities that have a type that is registered with the Container. 
	 * @param mixed $obj
	 */
	private function resolveProperties(&$obj)
	{
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
	
	/**
	 * 
	 * @param string $dataType
	 * @return object|NULL If the $dataType is registered, the this function creates the corresponding object and returns it;
	 * otherwise, this function returns null
	 */
	public function resolve($dataType) 
	{
		$dataType = trim($dataType, "\\");
		$obj = null;
		if(isset($this->singletonRegistry[$dataType])) 
		{
			//TODO: check if the class exists
			$className = $this->singletonRegistry[$dataType];
			$obj = $className::getInstance();
		} 
		else if(isset($this->closureRegistry[$dataType]))
		{
			$obj = $this->closureRegistry[$dataType]();
		}
		else if(isset($this->typeRegistry[$dataType])) 
		{
			$obj = $this->createObject($this->typeRegistry[$dataType]);
		}
		
		if($obj !== null) 
		{
			//Now we need to resolve the object properties
			$this->resolveProperties($obj);
		}
		return $obj;
	}
	
	/**
	 * @see \DecoupledApp\Interfaces\Container\ContainerInterface::make()
	 */
	public function make($dataType)
	{
		$obj = $this->createObject($dataType);
		$this->resolveProperties($obj);
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