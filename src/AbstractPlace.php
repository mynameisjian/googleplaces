<?php

namespace JianHan\GooglePlaces;

class AbstractPlace
{

	protected $key;	

	protected $requestParameters;

	public function __construct($key, array $requestParameters = array())
	{

		$this->key = $key;

		$this->requestParameters = $requestParameters;

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

}