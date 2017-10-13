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
     * @throws TransformationException
     * @throws \Throwable
     * @throws TypeException
     */
    public function transform($value)
    {
        if ($value === null) {
            return null;
        }
        $thisClass = get_class($this);
        try {
            $this->validateInputTypes($value);
            return $this->transformInputValue($value);
        } catch (TypeException $e) {
            throw new TransformerTypeException($thisClass, 'Type of value invalid.');
        } catch (\Throwable $e) {
            throw new TransformationException($thisClass, $e->getMessage());
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