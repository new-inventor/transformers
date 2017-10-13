<?php

use NewInventor\Transformers\Exception\TransformationException;
use NewInventor\Transformers\Exception\TypeException;
use NewInventor\Transformers\Transformer\StringToDateTime;

class StringToDateTimeTest extends \Codeception\Test\Unit
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
        $transformer = new StringToDateTime();
        $this->assertSame('12.12.2017 00:00:00', $transformer->transform('12.12.2017 00:00:00')->format('d.m.Y H:i:s'));
        $transformer = new StringToDateTime('d.m.Y');
        $this->assertSame('12.12.2017', $transformer->transform('12.12.2017')->format('d.m.Y'));
        $this->expectException(TransformationException::class);
        $transformer->transform('12.12.2017 00:00:00');
    }
    
    public function test1()
    {
        $transformer = new StringToDateTime();
        $this->expectException(TypeException::class);
        $transformer->transform(1);
    }
    
    public function test2()
    {
        $transformer = new StringToDateTime();
        $this->expectException(TypeException::class);
        $transformer->transform(1.4);
    }
    
    public function test3()
    {
        $transformer = new StringToDateTime();
        $this->expectException(TypeException::class);
        $transformer->transform(true);
    }
    
    public function test4()
    {
        $transformer = new StringToDateTime();
        $this->expectException(TypeException::class);
        $transformer->transform([]);
    }
    
    public function test5()
    {
        $transformer = new StringToDateTime();
        $this->expectException(TypeException::class);
        $transformer->transform(new stdClass());
    }
}