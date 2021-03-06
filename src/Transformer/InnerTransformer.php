<?php
/**
 * Project: property-bag
 * User: george
 * Date: 05.10.17
 */

namespace NewInventor\Transformers\Transformer;


use NewInventor\Transformers\ArrayTransformerContainerInterface;
use NewInventor\Transformers\TransformerContainer;
use NewInventor\TypeChecker\TypeChecker;

class InnerTransformer extends TransformerContainer implements ArrayTransformerContainerInterface
{
    protected function transformInputValue($value)
    {
        if (!empty($this->transformers)) {
            $i = 0;
            $transformer = $this->transformers[$i];
            foreach ($value as $key => $item) {
                if ($transformer !== null) {
                    try {
                        $value[$key] = $transformer->transform($value[$key]);
                    } catch (\Throwable $e) {
                        $this->errors[$key] = $e;
                    }
                }
                if (array_key_exists(++$i, $this->transformers)) {
                    $transformer = $this->transformers[$i];
                }
            }
        }
        
        return $value;
    }
    
    protected function validateInputTypes($value)
    {
        TypeChecker::check($value)->tarray()->fail();
    }
}