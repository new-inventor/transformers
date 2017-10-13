<?php

use NewInventor\Transformers\Exception\TransformationException;
use NewInventor\Transformers\Exception\TypeException;
use NewInventor\Transformers\Transformer\StringToPhone;

class StringToPhoneTest extends \Codeception\Test\Unit
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
        $transformer = new StringToPhone();
        $this->assertSame('+09876543211', $transformer->transform('09876543211'));
        $this->assertSame('+09876543211', $transformer->transform('+09876543211'));
        $this->assertSame('+09876543211', $transformer->transform('+0(987)654-32-11'));
        $this->assertSame('+09876543211', $transformer->transform('+0 987 654 32 11'));
        $this->assertSame('+09876543211', $transformer->transform('+0-987-654-32-11'));
        $this->expectException(TransformationException::class);
        $transformer->transform('09876');
    }
    
    public function test1()
    {
        $transformer = new StringToPhone();
        $this->expectException(TypeException::class);
        $transformer->transform(1);
    }
    
    public function test2()
    {
        $transformer = new StringToPhone();
        $this->expectException(TypeException::class);
        $transformer->transform(1.4);
    }
    
    public function test3()
    {
        $transformer = new StringToPhone();
        $this->expectException(TypeException::class);
        $transformer->transform(true);
    }
    
    public function test4()
    {
        $transformer = new StringToPhone();
        $this->expectException(TypeException::class);
        $transformer->transform([]);
    }
    
    public function test5()
    {
        $transformer = new StringToPhone();
        $this->expectException(TypeException::class);
        $transformer->transform(new stdClass());
    }
}