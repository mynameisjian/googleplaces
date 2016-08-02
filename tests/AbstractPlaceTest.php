<?php

use JianHan\GooglePlaces\AbstractPlace;

class AbstractPlaceTest extends PHPUnit_Framework_TestCase
{

	protected $classNameToBeTested;

	protected $reflectionClassToBeTested;

	protected $mockedAbstractPlace;

	protected function setUp()
    {

        $this->classNameToBeTested    	 = '\\JianHan\\GooglePlaces\\AbstractPlace';

        $this->reflectionClassToBeTested = new ReflectionClass($this->classNameToBeTested);

        $this->mockedAbstractPlace = $this->getMockBuilder($this->classNameToBeTested)
			 				  			  ->setMethods(array('validateRequiredParameters'))
				 			  			  ->disableOriginalConstructor()
			 				  			  ->getMockForAbstractClass()
			 				  			  ->expects($this->any())
             							  ->method('validateRequiredParameters')
             							  ->will($this->returnValue(TRUE));

    }

    protected function tearDown()
    {

    	$this->reflectionClassToBeTested = null;

    	$this->classNameToBeTested 		 = null;

    	$this->mockedAbstractPlace       = null;

    }

}