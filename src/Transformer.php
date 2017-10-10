<?php
/**
 * Project: TP messaging service
 * User: george
 * Date: 11.09.17
 */

namespace NewInventor\Transformers;


use NewInventor\Transformers\Exception\TransformationException;

abstract class Transformer implements TransformerInterface
{
    public static function make(...$config): TransformerInterface
    {
        /** @noinspection PhpMethodParametersCountMismatchInspection */
        return new static(...$config);
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
        try {
            return $this->transformInputValue($value);
        } catch (\Throwable $e) {
            throw new TransformationException(get_class($this), $e, $e->getMessage());
        }
    }
    
    /**
     * @param $value
     *
     * @throws \NewInventor\TypeChecker\Exception\TypeException
     */
    protected function validateInputTypes($value)
    {
    
    }
    
    /**
     * @param $value
     *
     * @return mixed
     */
    abstract protected function transformInputValue($value);
}