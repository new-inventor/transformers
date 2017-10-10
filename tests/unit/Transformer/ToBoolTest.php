<?php

use NewInventor\Transformers\Transformer\ToBool;

class ToBoolTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }
    
    protected function _after()
    {
    }
    
    // tests
    public function testSomeFeature()
    {
        $transformer = new ToBool();
        $this->assertNull($transformer->transform(null));
        $this->assertFalse($transformer->transform([]));
        $this->assertTrue($transformer->transform([null]));
        $this->assertTrue($transformer->transform('qwe'));
        $this->assertTrue($transformer->transform(123));
        $this->assertTrue($transformer->transform(123.0));
        $this->assertTrue($transformer->transform(true));
        $class = new stdClass();
        $this->assertTrue($transformer->transform($class));
        $transformer = new ToBool(['on'], ['off']);
        $this->assertTrue($transformer->transform('on'));
        $this->assertFalse($transformer->transform('off'));
    }
}