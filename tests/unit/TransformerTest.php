<?php

use NewInventor\Transformers\Transformer\StringToDateTime;

class TransformerTest extends \Codeception\Test\Unit
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
        $transformer = StringToDateTime::make('d.m.Y');
        $this->assertSame('12.12.2017', $transformer->transform('12.12.2017')->format('d.m.Y'));
    }
}