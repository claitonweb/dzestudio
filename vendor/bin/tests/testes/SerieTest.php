<?php

class SerieTest extends \PHPUnit_Framework_TestCase
{
	protected $serie;
    protected function setUp()
    {
		 //require __DIR__ . '/../../vendor/autoload.php';
		 require __DIR__ . '/../../../../classes/Serie.php';
		 
		 $this->serie = new Serie;
    }

    protected function tearDown()
    {
    }

    // tests
    public function testSetId()
    {
		$this->serie->setId('a');
		$this->assertEquals('a', $this->serie->getId());
    }
}
