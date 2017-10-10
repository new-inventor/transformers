<?php
/**
 * Project: TP messaging service
 * User: george
 * Date: 10.08.17
 */

namespace NewInventor\Transformers\Transformer;


use NewInventor\Transformers\Transformer;
use NewInventor\TypeChecker\TypeChecker;

class ToInt extends Transformer
{
    protected function validateInputTypes($value)
    {
        TypeChecker::check($value)->tnumeric()->fail();
    }
    
    protected function transformInputValue($value)
    {
        return (int)$value;
    }
}