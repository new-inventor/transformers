<?php
/**
 * Project: transformers
 * User: george
 * Date: 10.10.17
 */

namespace NewInventor\Transformers;


use NewInventor\Transformers\Exception\TransformationContainerException;
use NewInventor\Transformers\Exception\TransformationException;
use NewInventor\Transformers\Exception\TypeException as TransformerTypeException;
use NewInventor\TypeChecker\Exception\TypeException;

abstract class TransformerContainer extends Transformer implements TransformerContainerInterface
{
    protected $errors = [];
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
     * @throws TransformationContainerException
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
        try {
            $this->validateInputTypes($value);
            if ($this->transformers === []) {
                return $value;
            }
            $res = $this->transformInputValue($value);
            if ($this->errors !== []) {
                throw new TransformationContainerException(
                    get_class($this),
                    $this->errors,
                    'Transformer can not transform value'
                );
            }
            
            return $res;
        } catch (TypeException $e) {
            throw new TransformerTypeException(get_class($this), 'Type of value invalid');
        }
    }
}