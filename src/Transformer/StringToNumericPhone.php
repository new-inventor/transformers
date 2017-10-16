<?php
/**
 * Project: transformers
 * User: george
 * Date: 16.10.17
 */

namespace NewInventor\Transformers\Transformer;


use NewInventor\Transformers\Transformer;
use NewInventor\TypeChecker\TypeChecker;

class StringToNumericPhone extends Transformer
{
    protected function transformInputValue($value)
    {
        $value = preg_replace('/\D/', '', $value);
        if (strlen($value) !== 11) {
            throw new \InvalidArgumentException('Phone should be string with 11 numbers');
        }
        
        return $value;
    }
    
    protected function validateInputTypes($value)
    {
        TypeChecker::check($value)->tstring()->fail();
    }
}