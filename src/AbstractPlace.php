<?php

namespace JianHan\GooglePlaces;

class AbstractPlace
{
	
	protected $key;	

	protected $requestParameters;

	public function __construct($key, $requestParameters = array())
	{

		if(!is_string($key) || empty(trim($key))) throw new \InvalidArgumentException("Key must be a string and must not be empty");

		$this->validateRequestParameters($requestParameters);

		$this->key = $key;

		$this->requestParameters = $requestParameters;

	}
	
	protected function validateRequestParameters($requestParameters)
	{

		if(!is_array($requestParameters)) throw new \InvalidArgumentException("Request parameters must be an array");

		foreach ($requestParameters as $key => $value) 
		{
			if(!is_string($value)) throw new \InvalidArgumentException("All request parameters value must be string");

			if(!is_string($key)) throw new \InvalidArgumentException("All request parameter keys must be string");
		}		

	}

	public function getKey()
	{

		return $this->key;

	}

	public function setKey($key)
	{

		$this->key = $key;

	}

	public function getRequestParameters()
	{

		return $this->requestParameters;

	}
	
	public function setRequestParameters(array $requestParameters = array())
	{

		$this->requestParameters = $requestParameters;

	}

	public function setRequestParameter($parameterKey, $parameterValue)
	{

		if(!is_string($parameterKey) && !is_numeric($parameterKey) || !is_string($parameterValue) && !is_numeric($parameterValue))
		{
			throw new \InvalidArgumentException("Request parameter both key and value must be string or number");
		}

		if(empty($parameterKey) || empty($parameterValue)) throw new \InvalidArgumentException("Request parameter key and value bot not be empty");

		$parameterKey = (string)$parameterKey;

		$parameterValue = (string)$parameterValue;

		$this->requestParameters[$parameterKey] = $parameterValue;

	}

	public function getRequestParameter($parameterKey)
	{

		if(!is_string($parameterKey) || empty($parameterKey)) throw new \InvalidArgumentException("Request parameter key must be string and can not be empty");

		return $this->requestParameters[$parameterKey];

	}

}