<?php

namespace JianHan\GooglePlaces;

abstract class AbstractPlace
{

	const GOOGLE_PLACE_URL_PREFIX = 'https://maps.googleapis.com/maps/api/place/';

	protected $key;	

	protected $requestParameters;
	
	protected $outputFormat;	

	protected $requestUrl;

	public function __construct($key, $requestParameters = array(), $outputFormat = 'json')
	{

		$this->validateString($key, 'Key');

		$this->validateString($outputFormat, 'Output format');

		if($outputFormat != 'json' && $outputFormat != 'xml')
		{
			throw new \InvalidArgumentException('Output format must be json or xml');
		}

		$this->outputFormat = $outputFormat;
			
		$this->key = $key;

		$this->requestParameters = $this->validateRequestParameters($requestParameters);

		$this->autoGenerateRequestUrl();
	}

	protected abstract function validateRequiredParameters();	

	protected function autoGenerateRequestUrl()
	{

		$reflection = new \ReflectionClass(get_called_class());

		$this->requestUrl = self::GOOGLE_PLACE_URL_PREFIX.strtolower($reflection->getShortName()).'/'.$this->outputFormat;

	}

	protected function validateString($string, $displayName)
	{

		if(!is_string($string) || trim($string) === '')
		{
			throw new \InvalidArgumentException("$displayName must be a string and must not be empty");
		}

	}	

	protected function validateRequestParameters($requestParameters)
	{

		if(!is_array($requestParameters)) throw new \InvalidArgumentException("Request parameters must be an array");

		foreach ($requestParameters as $key => $value) 
		{

			$this->validateString($value, 'All request parameter values');

			$this->validateString($key, 'All request parameter keys');

		}		

		return $requestParameters;

	}

	public function getKey()
	{

		return $this->key;

	}

	public function setKey($key)
	{

		$this->validateString($key, 'Key');

		$this->key = $key;

	}

	public function getRequestParameters()
	{

		return $this->requestParameters;

	}
	
	public function setRequestParameters(array $requestParameters = array())
	{

		$this->validateRequestParameters($requestParameters);

		$this->requestParameters = $requestParameters;

	}

	public function setRequestParameter($parameterKey, $parameterValue)
	{

		$this->validateString($parameterKey, 'Request parameter key');

		$this->validateString($parameterValue, 'Request parameter value');

		$parameterKey = (string)$parameterKey;

		$parameterValue = (string)$parameterValue;

		$this->requestParameters[$parameterKey] = $parameterValue;

	}

	public function getRequestParameter($parameterKey)
	{

		$this->validateString($parameterKey, 'Request parameter key');

		return $this->requestParameters[$parameterKey];

	}

}