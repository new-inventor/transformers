<?php

use NewInventor\Transformers\Transformer\Utf8StringToAsciiString;
use NewInventor\TypeChecker\Exception\TypeException;

class Utf8StringToAsciiStringTest extends \Codeception\Test\Unit
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
        $transformer = new Utf8StringToAsciiString();
        $this->assertNull($transformer->transform(null));
        $this->assertSame('asdU+1F601asdU+1F602asd', $transformer->transform('asd😁asd😂asd'));
    }
    
    public function test1()
    {
        $transformer = new Utf8StringToAsciiString();
        $this->expectException(TypeException::class);
        $transformer->transform(1);
    }
    
    public function test2()
    {
        $transformer = new Utf8StringToAsciiString();
        $this->expectException(TypeException::class);
        $transformer->transform(1.4);
    }
    
    public function test3()
    {
        $transformer = new Utf8StringToAsciiString();
        $this->expectException(TypeException::class);
        $transformer->transform(true);
    }
    
    public function test4()
    {
        $transformer = new Utf8StringToAsciiString();
        $this->expectException(TypeException::class);
        $transformer->transform([]);
    }
    
    public function test5()
    {
        $transformer = new Utf8StringToAsciiString();
        $this->expectException(TypeException::class);
        $transformer->transform(new stdClass());
    }
}