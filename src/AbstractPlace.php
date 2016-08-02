<?php

namespace JianHan\GooglePlaces;

abstract class AbstractPlace
{

	protected $key;	

	protected $requestParameters;

	public function __construct(string $key)
	{
		
		$this->key = $key;

	}

	protected abstract function validateRequiredParameters();
	
	protected function getClassShortName() : string
	{

		$reflection = new \ReflectionClass(get_called_class());

		return $reflection->getShortName();

	}

	public function getKey() : string
	{

		return $this->key;

	}

	public function setKey(string $key)
	{

		$this->key = $key;

	}

	public function getRequestParameters() : array
	{

		return $this->requestParameters;

	}
	
	public function setRequestParameters(array $requestParameters = array()) : array
	{

		$this->requestParameters = $requestParameters;

	}

	public function setRequestParameter(string $parameterKey, string $parameterValue)
	{

		$this->requestParameters[$parameterKey] = $parameterValue;

	}

	public function getRequestParameter($parameterKey) : string
	{

		return $this->requestParameters[$parameterKey];

	}

}