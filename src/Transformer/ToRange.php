<?php
/**
 * Project: TP messaging service
 * User: george
 * Date: 03.09.17
 */

namespace NewInventor\Transformers\Transformer;


use NewInventor\Transformers\Transformer;

class ToRange extends Transformer
{
    /** @var mixed|null */
    protected $min;
    /** @var mixed|null */
    protected $max;
    
    /**
     * ToRange constructor.
     *
     * @param mixed|null    $min
     * @param mixed|null    $max
     */
    public function __construct($min = null, $max = null)
    {
        $this->min = $min;
        $this->max = $max;
    }
    
    protected function transformInputValue($value)
    {
        if ($this->max !== null && $value > $this->max) {
            $value = $this->max;
        }
        if ($this->min !== null && $value < $this->min) {
            $value = $this->min;
        }
        
        return $value;
    }
}