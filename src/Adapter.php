<?php namespace JianHan\GooglePlaces;

interface Adapter
{

	const API_BASE_URL = 'https://maps.googleapis.com/maps/api/place/';

	public function request(array $requestParameters, string $format = 'json');

}