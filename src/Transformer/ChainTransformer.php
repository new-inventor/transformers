<?php
/**
 * Project: property-bag
 * User: george
 * Date: 05.10.17
 */

namespace NewInventor\Transformers\Transformer;


use NewInventor\Transformers\TransformerContainer;

class ChainTransformer extends TransformerContainer
{
    protected function transformInputValue($value)
    {
        if (!empty($this->transformers)) {
            foreach ($this->transformers as $transformer) {
                try {
                    $value = $transformer->transform($value);
                } catch (\Throwable $e) {
                    $this->errors[] = $e;
                }
            }
        }
        
        return $value;
    }
}