<?php

use NewInventor\Transformers\Transformer\BoolToMixed;
use NewInventor\Transformers\Transformer\ChainTransformer;
use NewInventor\Transformers\Transformer\StringToUpperCase;

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
}