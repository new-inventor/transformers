<?php

use NewInventor\Transformers\Transformer\ToString;
use NewInventor\TypeChecker\Exception\TypeException;
use TestsTransformers\TestStringable;

class ToStringTest extends \Codeception\Test\Unit
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
        $transformer = new ToString();
        $this->assertNull($transformer->transform(null));
        $this->assertSame('1', $transformer->transform(1));
        $this->assertSame('1.1', $transformer->transform(1.1));
        $this->assertSame('qwe', $transformer->transform('qwe'));
        $this->assertSame('1', $transformer->transform(true));
        $this->assertSame('', $transformer->transform(false));
        $class = new TestStringable();
        $this->assertSame('1234567890', $transformer->transform($class));
    }
    
    public function test4()
    {
        $transformer = new ToString();
        $this->expectException(TypeException::class);
        $transformer->transform([]);
    }
    
    public function test5()
    {
        $transformer = new ToString();
        $this->expectException(TypeException::class);
        $transformer->transform(new stdClass());
    }
}