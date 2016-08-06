<?php namespace JianHan\GooglePlaces;

class PlaceAdapter implements Adapter
{

	private $place;

	private $guzzleHttpClient;

	private $requestUrl;

	public function __construct(AbstractPlace $place, \GuzzleHttp\Client $guzzleHttpClient)
	{

		$this->place = $place;

		$this->guzzleHttpClient = $guzzleHttpClient;

	}	

	public function request(array $requestParameters, string $responseFormat = 'json')
	{

		$this->place->setRequestParameters($requestParameters);

		$this->autoGenerateRequestUrl($responseFormat);

	}

	public function getPlace() : AbstractPlace
	{

		return $this->place;

	}	

	public function getRequestUrl()
	{

		return $this->requestUrl;

	}

	private function autoGenerateRequestUrl(string $responseFormat)
	{

		$this->requestUrl = self::API_BASE_URL.strtolower((new \ReflectionClass($this->place))->getShortName()).'/'.$responseFormat;

	}

}