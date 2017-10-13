<?php

use NewInventor\Transformers\Exception\TypeException;
use NewInventor\Transformers\Transformer\BoolToMixed;

class BoolToMixedTest extends \Codeception\Test\Unit
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
        $transformer = new BoolToMixed();
        $this->assertSame('1', $transformer->transform(true));
        $this->assertSame('0', $transformer->transform(false));
        $transformer = new BoolToMixed('true', 'false');
        $this->assertSame('true', $transformer->transform(true));
        $this->assertSame('false', $transformer->transform(false));
        $transformer = new BoolToMixed(1, 0);
        $this->assertSame(1, $transformer->transform(true));
        $this->assertSame(0, $transformer->transform(false));
    }
    
    public function test1()
    {
        $transformer = new BoolToMixed();
        $this->expectException(TypeException::class);
        $transformer->transform(1);
    }
    
    public function test2()
    {
        $transformer = new BoolToMixed();
        $this->expectException(TypeException::class);
        $transformer->transform(1.4);
    }
    
    public function test3()
    {
        $transformer = new BoolToMixed();
        $this->expectException(TypeException::class);
        $transformer->transform('66');
    }
    
    public function test4()
    {
        $transformer = new BoolToMixed();
        $this->expectException(TypeException::class);
        $transformer->transform([]);
    }
    
    public function test5()
    {
        $transformer = new BoolToMixed();
        $this->expectException(TypeException::class);
        $transformer->transform(new stdClass());
    }
}