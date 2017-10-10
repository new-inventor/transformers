<?php

use NewInventor\Transformers\Exception\TransformationException;
use NewInventor\Transformers\Transformer\BoolToMixed;
use NewInventor\Transformers\Transformer\InnerTransformer;
use NewInventor\Transformers\Transformer\StringToDateTime;
use NewInventor\Transformers\Transformer\StringToUpperCase;
use NewInventor\TypeChecker\Exception\TypeException;

class InnerTransformerTest extends \Codeception\Test\Unit
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
        $transformer = new InnerTransformer(
            new BoolToMixed('true', 'false'),
            new StringToUpperCase()
        );
        $this->assertSame(['true', 'QWE'], $transformer->transform([true, 'qWe']));
        $this->assertSame(['false', 'QWE'], $transformer->transform([false, 'qWe']));
        $transformer = new InnerTransformer();
        $this->assertSame(['123'], $transformer->transform(['123']));
        $this->expectException(TransformationException::class);
        $transformer = new InnerTransformer(
            new BoolToMixed('true', 'false'),
            new StringToUpperCase()
        );
        $transformer->transform(['qwe', 123]);
    }
    
    public function test1()
    {
        $transformer = new InnerTransformer();
        $this->expectException(TypeException::class);
        $transformer->transform(1);
    }
    
    public function test2()
    {
        $transformer = new InnerTransformer();
        $this->expectException(TypeException::class);
        $transformer->transform(1.0);
    }
    
    public function test3()
    {
        $transformer = new InnerTransformer();
        $this->expectException(TypeException::class);
        $transformer->transform(true);
    }
    
    public function test4()
    {
        $transformer = new InnerTransformer();
        $this->expectException(TypeException::class);
        $transformer->transform('qwe');
    }
    
    public function test5()
    {
        $transformer = new InnerTransformer();
        $this->expectException(TypeException::class);
        $transformer->transform(new stdClass());
    }
    
    public function test6()
    {
        $transformer = new InnerTransformer(
            new StringToDateTime('d.m.Y')
        );
        $this->expectException(TransformationException::class);
        $transformer->transform(['12.12.2017 12:12:12']);
    }
}