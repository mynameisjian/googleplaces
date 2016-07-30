<?php

use JianHan\GooglePlaces\AbstractPlace;

class AbstractPlaceTest extends PHPUnit_Framework_TestCase
{

	protected $classNameToBeTested;

	protected $reflectionClassToBeTested;

	protected function setUp()
    {

        $this->classNameToBeTested    	 = '\\JianHan\\GooglePlaces\\AbstractPlace';

        $this->reflectionClassToBeTested = new ReflectionClass($this->classNameToBeTested);

    }

    protected function tearDown()
    {

    	$this->reflectionClassToBeTested = null;

    	$this->classNameToBeTested 		 = null;

    }

    public static function validKeyProvider()
    {
    	return [

    		['AIzaSyAQOXoOT0y2fvf-bW3-ID2kWnYChpLSADd'],

    	];
    }

    public static function invalidKeyProvider()
    {

    	return array(

    		array(TRUE),
    		array(FALSE),
    		array(rand(1,2000)),
    		array(1.234),
    		array(1.2e3),
    		array(7E-10),
    		array([1,2,3]),
    		array(new stdClass())
    	);

    }

    public static function validRequestParametersProvider()
    {
    	return [

    		[['query' => 'test']],

    	];
    }

    public static function invalidRequestParametersProvider()
    {

    	return [

    		array(TRUE),
    		array(FALSE),
    		array(rand(1,2000)),
    		array(1.234),
    		array(1.2e3),
    		array(7E-10),
    		[1,2,3,[1,2,3],4,5,6],
    		array(new stdClass()),
    		[['invalidStdClass' => new stdClass()]]

    	];
    }

    public static function invalidRequestParameterArray()
    {
    	return array(
	        array('invalidboolean', false),
	        array('invalidObject', new stdClass()),
	        array('invalidArray', [1,2,3]),
	    );

    }

	public function testExist()
	{
		$this->assertTrue(class_exists($this->classNameToBeTested));
	}	

	/**
	 * @depends testExist
	 */
	public function testHasKeyAttribute()
	{
		$this->assertClassHasAttribute('key', $this->classNameToBeTested);
	}

	/**
	 * @depends testHasKeyAttribute
	 */
	public function testIsKeyProtectedAttribute()
	{
		$this->assertTrue($this->reflectionClassToBeTested->getProperty('key')->isProtected());
	}

	/**
	 * @depends testIsKeyProtectedAttribute
	 */
	public function testIsGetterKeyMethodExist()
	{

		$methodName = $this->reflectionClassToBeTested->getMethod('getKey')->getName();

		$this->assertEquals($methodName, 'getKey');

	}

	/**
	 * @depends testIsGetterKeyMethodExist
	 */
	public function testIsGetterKeyMethodPublic()
	{
		$method = $this->reflectionClassToBeTested->getMethod('getKey');

		$this->assertTrue($method->isPublic(), TRUE);
	}

	/**
	 * @depends testIsKeyProtectedAttribute
	 */
	public function testIsSetterKeyMethodExist()
	{

		$methodName = $this->reflectionClassToBeTested->getMethod('setKey')->getName();

		$this->assertEquals($methodName, 'setKey');

	}

	/**
	 * @depends testIsGetterKeyMethodExist
	 */
	public function testIsSetterKeyMethodPublic()
	{
		$method = $this->reflectionClassToBeTested->getMethod('setKey');

		$this->assertTrue($method->isPublic(), TRUE);
	}

	/**
	 * @depends testExist
	 */
	public function testHasRequestParametersAttribute()
	{

		$this->assertClassHasAttribute('requestParameters', $this->classNameToBeTested);

	}

	/**
	 * @depends testHasRequestParametersAttribute
	 */
	public function testRequestParametersIsProtected()
	{

		$this->assertTrue($this->reflectionClassToBeTested->getProperty('requestParameters')->isProtected());		

	}

	/**
	 * @depends testHasRequestParametersAttribute
	 */
	public function testIsGetRequestParametersMethodExist()
	{

		$methodName = $this->reflectionClassToBeTested->getMethod('getRequestParameters')->getName();

		$this->assertEquals($methodName, 'getRequestParameters');

	}

	/**
	 * @depends testIsGetRequestParametersMethodExist
	 */	
	public function testIsGetRequestParametersMethodPublic()
	{

		$method = $this->reflectionClassToBeTested->getMethod('getRequestParameters');

		$this->assertTrue($method->isPublic(), TRUE);		

	}

	/**
	 * @depends testHasRequestParametersAttribute
	 */
	public function testIsSetRequestParametersMethodExist()
	{

		$methodName = $this->reflectionClassToBeTested->getMethod('setRequestParameters')->getName();

		$this->assertEquals($methodName, 'setRequestParameters');

	}

	/**
	 * @depends testIsSetRequestParametersMethodExist
	 */	
	public function testIsSetRequestParametersMethodPublic()
	{

		$method = $this->reflectionClassToBeTested->getMethod('setRequestParameters');

		$this->assertTrue($method->isPublic(), TRUE);		

	}

	/**
	 * @depends testExist
	 * @expectedException \InvalidArgumentException
	 */
	public function testConstructorWithNull()
	{

		$abstractPlace = $this->getMockForAbstractClass($this->classNameToBeTested, array(NULL));

	}

	/**
	 * @depends testExist
	 * @expectedException \InvalidArgumentException
	 */
	public function testConstructorWithEmptyKey()
	{

		$abstractPlace = $this->getMockForAbstractClass($this->classNameToBeTested, array(''));

	}

	/**
	 * @depends testExist
	 * @dataProvider invalidKeyProvider
	 * @expectedException \InvalidArgumentException
	 */
	public function testConstructorWithInvalidKeys($invalidKey)
	{

		$this->getMockForAbstractClass($this->classNameToBeTested, array($invalidKey));

	}

	/**
	 * @depends testExist
	 * @dataProvider validKeyProvider
	 */
	public function testConstructorWithValidKeys($validKey)
	{

		$abstractPlace = $this->getMockForAbstractClass($this->classNameToBeTested, array($validKey));

		$this->assertEquals($abstractPlace->getKey(), $validKey);
	}

	/**
	 * @depends testExist
	 */
	public function testSetGetKey()
	{

		$originalKey = 'originalKey';

		$abstractPlace = $this->getMockForAbstractClass($this->classNameToBeTested, array($originalKey));

		$currentKey = 'currentKey';

		$abstractPlace->setKey($currentKey);

		$getCurrentKey = $abstractPlace->getKey();

		$this->assertTrue(is_string($getCurrentKey), TRUE);

		$this->assertEquals($getCurrentKey , $currentKey);

	}

	/**
	 * @depends testExist
	 * @dataProvider invalidRequestParametersProvider
	 * @expectedException \InvalidArgumentException
	 */
	public function testConstructorWithInvalidRequestParameters($invalidRequestParameters)
	{

		$this->getMockForAbstractClass($this->classNameToBeTested, array('validKey', $invalidRequestParameters));

	}

	/**
	 * @depends testExist
	 * @dataProvider invalidRequestParametersProvider
	 * @expectedException \InvalidArgumentException
	 */
	public function testValidateRequestParameters($invalidRequestParameters)
	{

		$this->getMockBuilder($this->classNameToBeTested)
			 ->setMethods(null)
			 ->setConstructorArgs(array('validKey', $invalidRequestParameters))
			 ->getMock();

	}

	/**
	 * @depends testExist
	 * @dataProvider invalidRequestParameterArray
	 * @expectedException \InvalidArgumentException
	 */
	public function testSetRequestParameter($key, $value)
	{

		$abstractPlace = $this->getMockBuilder($this->classNameToBeTested)
			 				  ->setMethods(null)
				 			  ->disableOriginalConstructor()
			 				  ->getMock();


		$abstractPlace->setRequestParameter($key, $value);

	}

	/**
	 * @depends testExist
	 */
	public function testSetGetReuqestParameters()
	{

		$inputArray = ['testQuery1' => 'testQuery1', 'testQuery2' => 'testQuery2'];

		$abstractPlace = $this->getMockBuilder($this->classNameToBeTested)
			 				  ->setMethods(null)
				 			  ->disableOriginalConstructor()
			 				  ->getMock();	
		
		$abstractPlace->setRequestParameters($inputArray);

		$this->assertEquals($abstractPlace->getRequestParameters(), $inputArray);

	}

}