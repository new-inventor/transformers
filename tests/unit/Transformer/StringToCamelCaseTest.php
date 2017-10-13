<?php

use NewInventor\Transformers\Exception\TypeException;
use NewInventor\Transformers\Transformer\StringToCamelCase;

class StringToCamelCaseTest extends \Codeception\Test\Unit
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
        $transformer = new StringToCamelCase();
        $this->assertSame('qweAsdZxc', $transformer->transform('qwe asd  zxc'));
        $this->assertSame('qweAsdZxc', $transformer->transform('qwe_ asd_zxc'));
        $this->assertSame('qweAsdZxc', $transformer->transform('qweAsd_zxc'));
        $this->assertSame('QweAsdZxc', $transformer->transform('Qwe Asd_zxc'));
    }
    
    public function test1()
    {
        $transformer = new StringToCamelCase();
        $this->expectException(TypeException::class);
        $transformer->transform(1);
    }
    
    public function test2()
    {
        $transformer = new StringToCamelCase();
        $this->expectException(TypeException::class);
        $transformer->transform(1.4);
    }
    
    public function test3()
    {
        $transformer = new StringToCamelCase();
        $this->expectException(TypeException::class);
        $transformer->transform(true);
    }
    
    public function test4()
    {
        $transformer = new StringToCamelCase();
        $this->expectException(TypeException::class);
        $transformer->transform([]);
    }
    
    public function test5()
    {
        $transformer = new StringToCamelCase();
        $this->expectException(TypeException::class);
        $transformer->transform(new stdClass());
    }
}