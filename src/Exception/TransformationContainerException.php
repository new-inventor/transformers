<?php
/**
 * Project: transformers
 * User: george
 * Date: 13.10.17
 */

namespace NewInventor\Transformers\Exception;


use NewInventor\Transformers\Transformer\StringToScreamingSnakeCase;

class TransformationContainerException extends \InvalidArgumentException
{
    /** @var string */
    protected $className;
    /** @var string */
    protected $stringCode;
    /** @var array */
    protected $inner;
    
    /**
     * TransformationContainerException constructor.
     *
     * @param string $className
     * @param array  $inner
     * @param string $message
     */
    public function __construct(string $className, array $inner, string $message)
    {
        $this->className = $className;
        $this->stringCode = StringToScreamingSnakeCase::make()->transform($className);
        $this->inner = $inner;
        parent::__construct($message);
    }
    
    /**
     * @return string
     */
    public function getClassName(): string
    {
        return $this->className;
    }
    
    /**
     * @return string
     */
    public function getStringCode(): string
    {
        return $this->stringCode;
    }
    
    /**
     * @return array
     */
    public function getInner(): array
    {
        return $this->inner;
    }
}