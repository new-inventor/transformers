<?php

use NewInventor\Transformers\Exception\TransformationContainerException;
use NewInventor\Transformers\Transformer\BoolToMixed;
use NewInventor\Transformers\Transformer\ChainTransformer;
use NewInventor\Transformers\Transformer\StringToDateTime;
use NewInventor\Transformers\Transformer\StringToUpperCase;
use NewInventor\Transformers\Transformer\ToString;

class ChainTransformerTest extends \Codeception\Test\Unit
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
        $transformer = new ChainTransformer(
            new BoolToMixed('true', 'false'),
            new StringToUpperCase()
        );
        $this->assertSame('FALSE', $transformer->transform(false));
        $this->assertSame('TRUE', $transformer->transform(true));
        $transformer = new ChainTransformer();
        $this->assertSame('qwe', $transformer->transform('qwe'));
    }
    
    // tests
    public function testSometest()
    {
        $transformer = new ChainTransformer(
            new ToString(),
            new StringToDateTime('d.m.Y')
        );
        $this->assertSame('12.12.2017', $transformer->transform('12.12.2017')->format('d.m.Y'));
        $this->expectException(TransformationContainerException::class);
        $transformer->transform(1);
    }
}