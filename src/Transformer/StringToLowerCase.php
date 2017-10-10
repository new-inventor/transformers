<?php
/**
 * Project: property-bag
 * User: george
 * Date: 28.09.17
 */

namespace NewInventor\Transformers\Transformer;


use NewInventor\Transformers\Transformer;
use NewInventor\TypeChecker\TypeChecker;

class StringToLowerCase extends Transformer
{
    protected function transformInputValue($value)
    {
        return strtolower($value);
    }
    
    protected function validateInputTypes($value)
    {
        TypeChecker::check($value)->tstring()->fail();
    }
}