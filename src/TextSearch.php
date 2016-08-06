<?php namespace JianHan\GooglePlaces;

class TextSearch extends AbstractPlace
{
	
	public function validateRequiredParameters()
	{

		if(empty($this->requestParameters['query']))
		{

			throw new \InvalidArgumentException('Text search required "query" as an input parameter');

		}

	}	

}