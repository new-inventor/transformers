<?php
/**
 * Project: property-bag
 * User: george
 * Date: 05.10.17
 */

namespace NewInventor\Transformers\Transformer;


use NewInventor\Transformers\Transformer;
use NewInventor\Transformers\TransformerContainerInterface;
use NewInventor\Transformers\TransformerInterface;

class ChainTransformer extends Transformer implements TransformerContainerInterface
{
    /** @var TransformerInterface[][] */
    protected $transformers;
    
    /**
     * ArrayNormalizer constructor.
     *
     * @param array $transformers
     */
    public function __construct(TransformerInterface  ...$transformers)
    {
        $this->transformers = $transformers;
    }
    
    protected function transformInputValue($value)
    {
        if (!empty($this->transformers)) {
            foreach ($this->transformers as $transformer) {
                $value = $transformer->transform($value);
            }
        }
        
        return $value;
    }
}