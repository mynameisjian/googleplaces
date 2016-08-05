<?php
namespace JianHan\GooglePlaces;

abstract class AbstractPlace
{

	protected $key;	

	protected $requestParameters;

	public function __construct(string $key)
	{
	
		if(empty($key)) throw new \InvalidArgumentException('API key can not be blank');

		$this->key = $key;

	}

	public abstract function validateRequiredParameters();
	
	public function setRequestParameters(array $requestParameters = array())
	{

		if(empty($requestParameters)) throw new \InvalidArgumentException('Set request parameters must not be empty array');

		array_walk($requestParameters, function($value, $key){

			if(empty($value)) throw new \InvalidArgumentException('Request parameter "'.$key.'" can NOT be blank');

			if(!is_string($value)) throw new \InvalidArgumentException('Request parameter "'.$key.'" can only be string. ');

		});

		$this->requestParameters = $requestParameters;

	}

	public function getRequestParameters()
	{

		return $this->requestParameters;

	}

	public static function getInstance($service, $key)
	{

		$className = __NAMESPACE__.'\\'.$service;

		if(class_exists($className))
		{

			$classInstance = new $className($key);

			if(!($classInstance instanceof \JianHan\GooglePlaces\AbstractPlace)) throw new \Exception('System exception, invalid type');

			return $classInstance;

		}
		else
		{
			throw new \UnexpectedValueException($service.' has not been implemented yet.');
		}

	}

}