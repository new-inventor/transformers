<?php

use NewInventor\Transformers\Exception\TypeException;
use NewInventor\Transformers\Transformer\StringToUpperCase;

class StringToUpperCaseTest extends \Codeception\Test\Unit
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
        $transformer = new StringToUpperCase();
        $this->assertSame('QWE ASD  ZXC', $transformer->transform('qwe asd  Zxc'));
        $this->assertSame('QWE_ ASD_ZXC123', $transformer->transform('qwe_ asd_zxc123'));
        $this->assertSame('QWEASD_ZXC', $transformer->transform('qweAsd_zxc'));
        $this->assertSame('QWE ASD_ZXC', $transformer->transform('Qwe Asd_zxc'));
    }
    
    public function test1()
    {
        $transformer = new StringToUpperCase();
        $this->expectException(TypeException::class);
        $transformer->transform(1);
    }
    
    public function test2()
    {
        $transformer = new StringToUpperCase();
        $this->expectException(TypeException::class);
        $transformer->transform(1.4);
    }
    
    public function test3()
    {
        $transformer = new StringToUpperCase();
        $this->expectException(TypeException::class);
        $transformer->transform(true);
    }
    
    public function test4()
    {
        $transformer = new StringToUpperCase();
        $this->expectException(TypeException::class);
        $transformer->transform([]);
    }
    
    public function test5()
    {
        $transformer = new StringToUpperCase();
        $this->expectException(TypeException::class);
        $transformer->transform(new stdClass());
    }
}