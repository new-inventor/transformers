<?php

use NewInventor\Transformers\Exception\TypeException;
use NewInventor\Transformers\Transformer\ArrayToCsvString;

class ArrayToCsvStringTest extends \Codeception\Test\Unit
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
        $data = [123, 'asdasd', true, '123123', 123];
        $transformer = new ArrayToCsvString();
        $this->assertSame('123,asdasd,1,123123,123', $transformer->transform($data));
        $this->assertNull($transformer->transform(null));
        $transformer = new ArrayToCsvString(',', '"', '\\', true);
        $this->assertSame('123,"asdasd",1,"123123",123', $transformer->transform($data));
        $transformer = new ArrayToCsvString('|', '_', '+');
        $this->assertSame('123|asdasd|1|123123|123', $transformer->transform($data));
        $data = ['123+123', 'qwe_asd', 'zxc|zxc'];
        $this->assertSame('_123+123_|_qwe__asd_|_zxc|zxc_', $transformer->transform($data));
    }
    
    public function test1()
    {
        $transformer = new ArrayToCsvString();
        $this->expectException(TypeException::class);
        $transformer->transform(1);
    }
    
    public function test2()
    {
        $transformer = new ArrayToCsvString();
        $this->expectException(TypeException::class);
        $transformer->transform(1.0);
    }
    
    public function test3()
    {
        $transformer = new ArrayToCsvString();
        $this->expectException(TypeException::class);
        $transformer->transform(true);
    }
    
    public function test4()
    {
        $transformer = new ArrayToCsvString();
        $this->expectException(TypeException::class);
        $transformer->transform('qwe');
    }
    
    public function test5()
    {
        $transformer = new ArrayToCsvString();
        $this->expectException(TypeException::class);
        $transformer->transform(new stdClass());
    }
}