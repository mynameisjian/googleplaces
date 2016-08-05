<?php
namespace JianHan\GooglePlaces;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-08-05 at 15:22:55.
 */
class TextSearchTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TextSearch
     */
    protected $textSearchObject;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {

        $this->textSearchObject = new TextSearch('validKey');

    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {

        $this->textSearchObject = NULL;

    }

    /**
     * @covers JianHan\GooglePlaces\TextSearch::validateRequiredParameters
     * @expectedException InvalidArgumentException
     */
    public function testValidateRequiredParameters_EmptyArray_ThrowException()
    {

        $this->textSearchObject->setRequestParameters([]);

        $this->textSearchObject->validateRequiredParameters();

    }

    /**
     * @covers JianHan\GooglePlaces\TextSearch::validateRequiredParameters
     * @expectedException InvalidArgumentException
     */
    public function testValidateRequiredParameters_MissingQueryParameter_ThrowException()
    {

        $this->textSearchObject->setRequestParameters(['q' => 'text']);

        $this->textSearchObject->validateRequiredParameters();

    }

    /**
     * @covers JianHan\GooglePlaces\TextSearch::validateRequiredParameters
     * @expectedException InvalidArgumentException
     */
    public function testValidateRequiredParameters_EmptyQueryParameter_ThrowException()
    {

        $this->textSearchObject->setRequestParameters(['query' => '']);

        $this->textSearchObject->validateRequiredParameters();

    }

}