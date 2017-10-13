<?php
/**
 * Project: TP messaging service
 * User: george
 * Date: 11.09.17
 */

namespace NewInventor\Transformers;


use NewInventor\Transformers\Exception\TransformationException;
use NewInventor\Transformers\Exception\TypeException as TransformerTypeException;
use NewInventor\TypeChecker\Exception\TypeException;

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
     * @throws TransformerTypeException
     * @throws \NewInventor\Transformers\Exception\TransformationException
     * @throws \Throwable
     * @throws \NewInventor\TypeChecker\Exception\TypeException
     */
    public function transform($value)
    {
        if ($value === null) {
            return null;
        }
        try {
            $this->validateInputTypes($value);
            return $this->transformInputValue($value);
        } catch (TypeException $e) {
            throw new TransformerTypeException(get_class($this), 'Type of value invalid');
        } catch (\Throwable $e) {
            throw new TransformationException(get_class($this), 'Transformer can not transform value');
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