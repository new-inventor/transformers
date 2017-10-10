<?php
/**
 * Project: TP messaging service
 * User: george
 * Date: 10.08.17
 */

namespace NewInventor\Transformers\Transformer;


use NewInventor\Transformers\Transformer;

class ToArray extends Transformer
{
    protected function transformInputValue($value)
    {
        if (is_object($value) && method_exists($value, 'toArray')) {
            /** @noinspection PhpUndefinedMethodInspection */
            $value = $value->toArray();
        }
        if ($value instanceof \Iterator && $value instanceof \ArrayAccess) {
            $value = iterator_to_array($value);
        }
        if (!is_array($value)) {
            $value = [$value];
        }
        
        return $value;
    }
}