<?php
/**
 * Project: transformers
 * User: george
 * Date: 10.10.17
 */

namespace NewInventor\Transformers;


use NewInventor\Transformers\Exception\TransformationException;

abstract class TransformerContainer extends Transformer implements TransformerContainerInterface
{
    /** @var TransformerInterface[] */
    protected $transformers;
    
    /**
     * ArrayNormalizer constructor.
     *
     * @param TransformerInterface[] $transformers
     *
     * @throws \NewInventor\TypeChecker\Exception\TypeException
     */
    public function __construct(TransformerInterface ...$transformers)
    {
        $this->transformers = $transformers;
    }
    
    /**
     * @param mixed $value
     *
     * @return mixed
     * @throws \NewInventor\Transformers\Exception\TransformationException
     * @throws \Throwable
     * @throws \NewInventor\TypeChecker\Exception\TypeException
     */
    public function transform($value)
    {
        if ($value === null) {
            return null;
        }
        $this->validateInputTypes($value);
        if ($this->transformers === []) {
            return $value;
        }
        try {
            return $this->transformInputValue($value);
        } catch (\Throwable $e) {
            throw new TransformationException(get_class($this), $e, $e->getMessage());
        }
    }
}